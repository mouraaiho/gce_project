<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Invoice as Invoice;
use App\Client as Client;
use App\Counter as Counter;
use App\Consumption as Consumption;
use App\Config as Config;
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
        $searchField   = $request->input('searchField');
        #create or update your data here
        $data['consumptions'] = Consumption::getAllConsumptions($currPage,15, $month, $year, $searchField);
        $data['currPage'] = $currPage;
        return view("ajax.consumption_items", ['data' => $data ]);
    }

    public function updateConsumption(Request $request){
        $counter_id = $request->input('counter_id');
        $last_consumption   = $request->input('last_consumption');
        $this_consumption   = $request->input('this_consumption');
        $month   = $request->input('month');
        $year   = $request->input('year');
        $status = false;
        $consumption = Consumption::getConsumptionByCounterMonthYear($counter_id , $month , $year);

        if($consumption->isEmpty()){
            $value = $this_consumption - $last_consumption;
            $consumption_id = Consumption::AddConsumption($counter_id , $month , $year , $this_consumption);
            Invoice::addInvoice($month , $year , $value , $consumption_id);
            $status = true;
        }else{
            $value = $this_consumption - $last_consumption;
            Consumption::updateConsumption($this_consumption , $consumption[0]->id);
            Invoice::updateInvoice($month , $year , $value , $consumption[0]->id);
            $status = true;
        }
        return Response::json(array('success' => $status, 'counter_id' => $counter_id), 200);
    }


    public function invoices(Request $request){
      $counter_number = $request->input('counterNumber');
      $client_name = $request->input('clientName');
      $invoice_number = $request->input('invoiceNumber');
      $type_invoice = $request->input('typeInvoice');
      $month   = $request->input('month');
      $year   = $request->input('year');
      $currPage   = $request->input('pageN');
      $status = true;
      $data['invoices'] = Invoice::getInvoicesBy($currPage, $year,$month, $client_name , $counter_number , $invoice_number, $type_invoice);
      $data['currPage'] = $currPage;
      $invoiceList  = $request->session()->get('invoiceList', '');
      return view("ajax.invoice_items", ['data' => $data ,'invoiceList' => $invoiceList]);
    }


    public function updateConfig(Request $request){
      $name   = $request->input('name');
      $value  = $request->input('value');
      Config::updateConfig($name, $value);
      $status = true;
      return Response::json(array('success' => $status), 200);
    }

    public function emptySelectedInvoice(Request $request){
      $request->session()->forget('invoiceList');
      $status = true;
      return Response::json(array('success' => $status), 200);
    }

    public function addSelectedInvoice(Request $request){
      $status = true;
      $invoiceList   = $request->session()->get('invoiceList', '');
      if($invoiceList == ''){
        $status = false;
      }else{
        $status = Invoice::checkInvoiceCounterNumber($invoiceList);
      }
      return Response::json(array('status' => $status), 200);
    }

    public function selectedInvoice(Request $request){
      $checkboxVal   = $request->input('checkboxVal');
      $checkboxVal   = $checkboxVal === 'true'? true: false;
      $invoice_id    = $request->input('invoice_id');
      $invoiceList   = $request->session()->get('invoiceList', '');
      if($checkboxVal){
        $invoiceList = $invoiceList . $invoice_id .";";
        $request->session()->put('invoiceList', $invoiceList);
      }else{
        $invoiceList = str_replace($invoice_id .";","",$invoiceList);
        $request->session()->put('invoiceList', $invoiceList);
      }
      $invoiceList = $request->session()->get('invoiceList');
      return Response::json(array('invoiceList' => $invoiceList,'checkboxVal' => $checkboxVal), 200);
    }
}
