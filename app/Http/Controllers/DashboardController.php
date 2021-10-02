<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice as Invoice;
class DashboardController extends Controller
{
    public function index(Request $request){
      $currPage = 1;
      $data = array();
      $data['invoices'] = Invoice::getAllUnpaidInvoices($currPage);
      $data['currPage'] = $currPage;
      return view("dashboard.home", ['data' => $data ]);
    }

}
