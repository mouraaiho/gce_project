<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class InvoPayment extends Model
{
    //
    static function addInvoPayment($payment_id, $invoice_id){
      return DB::table('invo_payments')->insertGetId(
            [
              'payment_id' => $payment_id,
              'invoice_id' => $invoice_id,
            ]
        );
    }
}
