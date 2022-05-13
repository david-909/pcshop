<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Log;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Json;
use PDO;
use Throwable;

class CartController extends Controller
{
    public function cart()
    {
        $cartModel = new Cart();
        $productModel = new Product();
        $cart  = $cartModel->getCart(session("user")->id);
        $total = 0;
        foreach ($cart as $c) {
            $c->product = $productModel->getSingleProduct($c->product_id);
            $c->price = $c->product->price->price * $c->quantity;
            $total += $c->product->price->price * $c->quantity;
        }
        session()->put("totalPrice", $total);
        $cart->totalPrice = $total;
        $this->data["cart"] = $cart;
        #dd($this->data["cart"]);
        return view("pages.cart", $this->data);
    }
    public function store(Request $request)
    {
        $cartModel = new Cart();
            /* dd($request->product_id);
        dd(session("user")->id) */;
        $res = $cartModel->insertIntoCart($request->product_id, session("user")->id);
        if ($res) {
            return Json::encode(1);
        } else {
            return Json::encode(0);
        }
    }
    public function update(Request $request)
    {
        #dd($request);
        $cartModel = new Cart();
        $res = $cartModel->updateCart($request);
        if ($res) {
            $productModel = new Product();
            $cart = $cartModel->getCart(session("user")->id);
            $total = 0;
            foreach ($cart as $c) {
                $c->product = $productModel->getSingleProduct($c->product_id);
                $c->price = $c->product->price->price * $c->quantity;
                $total += $c->product->price->price * $c->quantity;
            }
            session()->put("totalPrice", $total);
            $cart->totalPrice = $total;
            #dd($cart->totalPrice);
            return Json::encode([$cart, $total]);
        }
    }
    public function delete(Request $request)
    {
        $cartModel = new Cart();
        $res = $cartModel->deleteCart($request);
        if ($res) {
            $productModel = new Product();
            $cart = $cartModel->getCart(session("user")->id);
            $total = 0;
            foreach ($cart as $c) {
                $c->product = $productModel->getSingleProduct($c->product_id);
                $c->price = $c->product->price->price * $c->quantity;
                $total += $c->product->price->price * $c->quantity;
            }
            session()->put("totalPrice", $total);
            $cart->totalPrice = $total;
            $this->data["cart"] = $cart;
            #dd($cart->totalPrice);
            // return Json::encode([$cart, $total]);
            return Json::encode(view("partials.cart", $this->data)->render(), $total);
        }
    }
    public function getTotalPrice()
    {
        #dd(session("totalPrice"));
        return Json::encode(session("totalPrice"));
    }
    public function orders()
    {
        $orders = Order::where("user_id", session("user")->id)->get();
        foreach ($orders as $order) {
            $order->products = OrderProducts::where("order_id", $order->id)->get();
        }
        $this->data["orders"] = $orders;
        return view("pages.myorders", $this->data);
    }
    public function order(Request $request)
    {
        /* dd($request->ip()); */
        $cartModel = new Cart();
        $productModel = new Product();
        $logModel = new Log();
        try {
            DB::beginTransaction();
            $products = $cartModel->getProductsInCart(session("user")->id);
            $orderId = $cartModel->makeOrder(session("user")->id, session("totalPrice"));
            #dd($products);
            if ($orderId) {
                foreach ($products as $product) {
                    $product->price = $productModel->getProductPrice($product->product_id);
                    $product->name = $productModel->getProductName($product->product_id);
                    $currentQuantity = $productModel->getCurrentQuantity($product->product_id);
                    $quantity = +$currentQuantity->quantity - +$product->quantity;
                    #dd($quantity);
                    $cartModel->insertOrderProducts($product->quantity, $orderId, $product->product_id, $product->price->price, $product->name->product);
                    $productModel->updateQuantity($product->product_id, $quantity);
                }
                $cartModel->clearCart(session("user")->id);
                $logModel->orderLog(session("user")->id, $orderId);
            }
            DB::commit();
            return redirect()->route("cart")->with("msg", "Successfully made an order");
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->route("cart")->with("err", $e->getMessage());
        }
    }
}
