<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice as Invoice;
use App\Payment as Payment;
use App\InvoPayment as InvoPayment;
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

    public function add(Request $request){
      $invoiceList  = $request->session()->get('invoiceList', '');
      $data = Invoice::getInvoiceById($invoiceList);
      $status = '';
      $message = '';
      $payment_id = '';
      if(!empty($request->input('success'))){
          $status = 'success';
          $message = $request->input('success');
          $payment_id = $request->input('payment_id');
          $request->session()->forget('invoiceList');
      }elseif (!empty($request->input('error'))) {
        $status = 'error';
        $message = $request->input('error');
      }
      return view("invoice.add", ['data' => $data,'status' => $status, 'message' => $message, 'payment_id' => $payment_id]);
    }
    public function save(Request $request){
      $method = $request->method();
      if ($request->isMethod('post')) {
          $total_price = $request->input('total_price');
          $pinality_price = $request->input('pinality_price');
          $pinality_date  = $request->input('pinality_date');
          $invoiceList  = $request->session()->get('invoiceList', '');
          if($invoiceList != ''){
            $invoiceList = rtrim(str_replace(";",",",$invoiceList),",");
            $idList = explode(',', $invoiceList);
            $payment_id = Payment::addPayment($total_price, $pinality_date, $pinality_price);
            foreach ($idList as $invoice_id) {
              Invoice::UpdateStatus($invoice_id);
              InvoPayment::addInvoPayment($payment_id, $invoice_id);
            }
            return redirect()->route('invoice.add',['success' => 'تم اداء الفواتير بنجاح','payment_id' => $payment_id]);
          }else{
            return redirect()->route('invoice.add',['error' => 'هناك خطأ في العملية المرجو التأكد من المعلومات']);
          }
      }else{
          return redirect()->route('invoice.add',['error' => 'هناك خطأ في العملية المرجو التأكد من المعلومات']);
      }
    }

}
