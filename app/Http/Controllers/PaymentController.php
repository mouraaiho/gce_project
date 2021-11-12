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
}
