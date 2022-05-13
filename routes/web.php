<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoryfilterController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(["isLogged"])->group(function () {

    Route::put('/user/{id}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('updateUser');
    Route::get('/user/{id}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('dashboard');
    Route::get("/wishlist", [WishlistController::class, "index"])->name("wishlist");
    Route::post("/wishlist/{id}", [WishlistController::class, "store"])->name("wishlist.store");
    Route::get("/cart", [CartController::class, "cart"])->name("cart");
    Route::post("/cart", [CartController::class, "store"])->name("cart.store");
    Route::put("/cart", [CartController::class, "update"])->name("cart.update");
    Route::delete("/cart", [CartController::class, "delete"])->name("cart.delete");
    Route::post("/order", [CartController::class, "order"])->name("order");
    Route::get("/orders", [CartController::class, "orders"])->name("orders");
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::post("postreview", [ReviewController::class, "store"])->name("postreview");
});

Route::get("/products/category/{category}", [CategoriesController::class, "productsInCategory"])->name("productsInCategory");


Route::get("/getTotalPrice", [CartController::class, "getTotalPrice"])->name("getTotalPrice");



Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/categories', [\App\Http\Controllers\CategoriesController::class, 'index'])->name('categories');
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contactpost');

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'index'])->name('register');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('registerpost');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginpost'])->name('loginpost');

Route::get("/author", [HomeController::class, "author"])->name("author");
Route::get("/filter", [ProductController::class, "filter"])->name("tofilter");


Route::middleware(["isLogged", "isAdmin"])->group(function () {
    Route::get("/adminpanel", [AdminController::class, "index"])->name("adminpanel");
    Route::get("/adminpanel/misc", [AdminController::class, "misc"])->name("misc");

    Route::get("/getFilterForCategory", [AdminController::class, "getFilterForCategory"])->name("getFiltersForCategory");

    Route::get("/adminpanel/city", [CityController::class, "create"])->name("createcity");
    Route::post("/adminpanel/city", [CityController::class, "insert"])->name("insertcity");
    Route::get("/adminpanel/city/{id}", [CityController::class, "edit"])->name("editcity");
    Route::put("/adminpanel/city/{id}", [CityController::class, "update"])->name("updatecity");
    Route::delete("/adminpanel/city/{id}", [CityController::class, "destroy"])->name("deletecity");

    Route::get("/adminpanel/payment", [PaymentController::class, "create"])->name("createpayment");
    Route::post("/adminpanel/payment", [PaymentController::class, "store"])->name("insertpayment");
    Route::get("/adminpanel/payment/{id}", [PaymentController::class, "edit"])->name("editpayment");
    Route::put("/adminpanel/payment/{id}", [PaymentController::class, "update"])->name("updatepayment");
    Route::delete("/adminpanel/payment/{id}", [PaymentController::class, "destroy"])->name("deletepayment");

    Route::get("/adminpanel/filters", [FilterController::class, "index"])->name("filters");
    Route::get("/adminpanel/filter", [FilterController::class, "create"])->name("createfilter");
    Route::post("/adminpanel/filters", [FilterController::class, "store"])->name("insertfilter");
    Route::get("/adminpanel/filters/{id}", [FilterController::class, "edit"])->name("editfilter");
    Route::put("/adminpanel/filters/{id}", [FilterController::class, "update"])->name("updatefilter");
    Route::delete("/adminpanel/filters/{id}", [FilterController::class, "destroy"])->name("deletefilter");

    Route::post("/adminpanel/filters/{id}", [FilterController::class, "addValues"])->name("addfiltervalues");
    Route::get("/adminpanel/getfiltervalues", [AdminController::class, "getFilterValues"])->name("getfiltervalues");
    Route::put("/adminpanel/updatefiltervalue", [AdminController::class, "updateFilterValue"])->name("updatefiltervalue");
    Route::delete("/adminpanel/deletefiltervalue", [AdminController::class, "deleteFilterValue"])->name("deletefiltervalue");

    Route::get("/adminpanel/categories", [AdminController::class, "getCategories"])->name("getcategories");
    Route::get("/adminpanel/category", [CategoriesController::class, "create"])->name("createcategory");
    Route::post("/adminpanel/category", [CategoriesController::class, "store"])->name("insertcategory");
    Route::get("/adminpanel/category/{id}", [CategoriesController::class, "edit"])->name("editcategory");
    Route::put("/adminpanel/category/{id}", [CategoriesController::class, "update"])->name("updatecategory");
    Route::delete("/adminpanel/category/{id}", [CategoriesController::class, "destroy"])->name("deletecategory");

    Route::post("/adminpanel/categories/{id}", [CategoryfilterController::class, "addValues"])->name("addcategoryfilters");
    Route::get("/adminpanel/getcategoryfilters", [AdminController::class, "getCategoryFilters"])->name("getcategoryfilters");
    Route::delete("/adminpanel/deletecategoryfilter", [AdminController::class, "deleteCategoryFilter"])->name("deletecategoryfilter");
});

Route::get('sendmail', [MailController::class, 'index'])->name("sendmail");

Route::resource("products", \App\Http\Controllers\ProductController::class);
/* Route::resource("payments", [PaymentController::class]); */
