<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Epmnzava\PaypalLaravel\PaypalLaravel as Paypal;

class PaypalController extends Controller
{
    
    public function payment(Request $request){

        $paypal_payments=new paypal;    
        $amount = 100;
        $tax = 0.00;
        $shipping= 0;
        $handling_fee=1;
        $description="Testing product";  
        $response=$paypal_payments->CreatePayment($amount, $tax, $shipping, $handling_fee, $description);
        $payment_id=$response["payment_id"];
        return redirect($response["checkout_link"]);

    }

    public function success(Request $request){

        $paypal=new Paypal;
        
        $response=$paypal->executePayment($request->paymentId,$request->PayerID);
        $resposeArray = json_decode($response);
        echo "<pre/>";
        print_r($resposeArray);
        die;
        
    }

    public function cancel(Request $request){

    }
}
