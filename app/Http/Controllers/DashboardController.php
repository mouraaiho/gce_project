<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice as Invoice;
class DashboardController extends Controller
{
    public function index(){
      $data = Invoice::getAllUnpaidInvoices();
      return view("dashboard.home", ['data' => $data]);
    }
}
