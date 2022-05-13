<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.admin.createpayment", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paymentModel = new Payment();
        $res = $paymentModel->insertPayment($request);
        if ($res) {
            return redirect()->route("misc")->with("msg", "Successfully added");
        } else {
            return redirect()->route("misc")->with("msg", "Unsuccessful");
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data["payment"] = Payment::where("id", $id)->first();
        return view("pages.admin.editpayment", $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paymentModel = new Payment();
        $res = $paymentModel->updatePayment($request, $id);
        return $res ? redirect()->route("misc")->with("msg", "Update successful") : redirect()->route("misc")->with("msg", "Update unsuccessful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentModel = new Payment();
        $res = $paymentModel->destroyPayment($id);
        return $res ? redirect()->route("misc")->with("msg", "Delete successful") : redirect()->route("misc")->with("msg", "Delete unsuccessful");
    }
}
