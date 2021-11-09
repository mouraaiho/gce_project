<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice as Invoice;
class InvoiceController extends Controller
{
    //
    public function index(){
        $currPage = 1;
        $data = array();
        $data['invoices'] = Invoice::getAllInvoices($currPage);
        $data['currPage'] = $currPage;
      return view("invoice.list", ['data' => $data]);
    }
}
