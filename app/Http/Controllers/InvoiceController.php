<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice as Invoice;
class InvoiceController extends Controller
{
    //
    public function index(Request $request){
        $currPage = 1;
        $data = array();
        $data['invoices'] = Invoice::getAllInvoices($currPage);
        $data['currPage'] = $currPage;
        $invoiceList  = $request->session()->get('invoiceList', '');
      return view("invoice.list", ['data' => $data,'invoiceList' => $invoiceList]);
    }

    public function add(){
      return view("invoice.add");
    }
    public function save(){

    }

}
