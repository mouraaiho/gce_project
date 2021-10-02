<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice as Invoice;
use App\Client as Client;
class AjaxController extends Controller
{
    //
    public function UnpaidInvoices(Request $request){
        $currPage = $request->input('pageN');
        #create or update your data here
        $data['invoices'] = Invoice::getAllUnpaidInvoices($currPage);
        $data['currPage'] = $currPage;
        return view("ajax.unpaid_invoice_items", ['data' => $data ]);
    }

    public function clients(Request $request){
        $currPage = $request->input('pageN');
        #create or update your data here
        $data['clients'] = Client::getAllClients($currPage);
        $data['currPage'] = $currPage;
        return view("ajax.client_items", ['data' => $data ]);
    }
}
