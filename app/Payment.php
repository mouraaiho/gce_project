<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    //
    static function getAllPayments($page = 1, $perPage = 15, $searchField = ''){
        $startAt = $perPage * ($page - 1);
        if($searchField == ''){
          $records =  DB::table('clients')
                        ->join('counters', 'clients.id', '=', 'counters.client_id')
                        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                        ->join('invo_payments', 'invoices.id', '=', 'invo_payments.invoice_id')
                        ->join('payments', 'invo_payments.payment_id', '=', 'payments.id')->get();

                        $data['totalPages'] = ceil(count($records) / $perPage);

                        $data['result'] = DB::table('clients')
                        ->join('counters', 'clients.id', '=', 'counters.client_id')
                        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                        ->join('invo_payments', 'invoices.id', '=', 'invo_payments.invoice_id')
                        ->join('payments', 'invo_payments.payment_id', '=', 'payments.id')
                        ->offset($startAt)
                        ->limit($perPage)
                        ->select('clients.cin', 'clients.name', 'clients.subscription_fees','counters.number as cnumber' , 'consumptions.month', 'consumptions.year', 'consumptions.value', 'invoices.id', 'invoices.number as inumber', 'invoices.price', 'invoices.status')->get();

        }else{
          $records =  DB::table('clients')
                        ->join('counters', 'clients.id', '=', 'counters.client_id')
                        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                        ->join('invo_payments', 'invoices.id', '=', 'invo_payments.invoice_id')
                        ->join('payments', 'invo_payments.payment_id', '=', 'payments.id')->get();

                        $data['totalPages'] = ceil(count($records) / $perPage);

                        $data['result'] = DB::table('clients')
                        ->join('counters', 'clients.id', '=', 'counters.client_id')
                        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                        ->join('invo_payments', 'invoices.id', '=', 'invo_payments.invoice_id')
                        ->join('payments', 'invo_payments.payment_id', '=', 'payments.id')
                        ->offset($startAt)
                        ->limit($perPage)
                        ->orWhere('clients.name' , 'like' , '%'. $searchField .'%')
                        ->orWhere('counters.number' , 'like' , '%'. $searchField .'%')
                        ->orWhere('invoices.number' , 'like' , '%'. $searchField .'%')
                        ->select('clients.cin', 'clients.name', 'clients.subscription_fees','counters.number as cnumber' , 'consumptions.month', 'consumptions.year', 'consumptions.value', 'invoices.id', 'invoices.number as inumber', 'invoices.price', 'invoices.status')->get();

        }
        return $data;
      }

    static function addPayment($total_price, $pinality_date, $pinality_price){
      return DB::table('payments')->insertGetId(
            [
              'total_price' => $total_price,
              'pinality_date' => $pinality_date,
              'pinality_price' => $pinality_price,
            ]
        );
    }

    static function getPaymentById($payment_id){
      $records =  DB::table('clients')
          ->join('counters', 'clients.id', '=', 'counters.client_id')
          ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
          ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
          ->join('invo_payments', 'invoices.id', '=', 'invo_payments.invoice_id')
          ->join('payments', 'invo_payments.payment_id', '=', 'payments.id')
          ->where('payments.id' , $payment_id)
          ->select('clients.cin', 'clients.name','clients.address','clients.phone', 'clients.subscription_fees','counters.number as cnumber' , 'consumptions.month', 'consumptions.year', 'consumptions.value', 'invoices.id', 'invoices.number as inumber', 'invoices.price', 'payments.total_price', 'payments.pinality_date', 'payments.pinality_price')->get();
      return $records;
    }
}
