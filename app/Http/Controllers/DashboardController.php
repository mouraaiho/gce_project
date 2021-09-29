<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice as Invoice;
class DashboardController extends Controller
{
    public function index(){
      $currPage = 1;
      $data = Invoice::getAllUnpaidInvoices($currPage);
      return view("dashboard.home", ['data' => $data,'currPage' => $currPage]);
    }
}
