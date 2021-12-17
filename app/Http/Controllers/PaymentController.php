<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment as Payment;
class PaymentController extends Controller
{
    //
    public function index(){
        $currPage = 1;
        $data = array();
        $data['payments'] = Payment::getAllPayments($currPage);
        $data['currPage'] = $currPage;
      return view("payment.list", ['data' => $data]);
    }

    public function printReceipt(Request $request){
      if(!empty($request->input('payment_id'))){
          $payment_id = $request->input('payment_id');
          $data = Payment::getPaymentById($payment_id);
          return view("payment.print_receipt", ['data' => $data]);
      }else {

      }
    }
}
