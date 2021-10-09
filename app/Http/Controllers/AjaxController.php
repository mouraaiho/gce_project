<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice as Invoice;
use App\Client as Client;
use App\Counter as Counter;
use App\Consumption as Consumption;
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
        $search   = $request->input('SearchField');
        #create or update your data here
        $data['clients'] = Client::getAllClients($currPage,15, $search);
        $data['currPage'] = $currPage;
        return view("ajax.client_items", ['data' => $data ]);
    }

    public function counters(Request $request){
        $currPage = $request->input('pageN');
        $search   = $request->input('SearchField');
        #create or update your data here
        $data['counters'] = Counter::getAllCounters($currPage,15, $search);
        $data['currPage'] = $currPage;
        return view("ajax.counter_items", ['data' => $data ]);
    }

    public function consumptions(Request $request){
        $currPage = $request->input('pageN');
        $month   = $request->input('month');
        $year   = $request->input('year');
        #create or update your data here
        $data['consumptions'] = Consumption::getAllConsumptions($currPage,15, $month, $year);
        $data['currPage'] = $currPage;
        return view("ajax.consumption_items", ['data' => $data ]);
    }
}
