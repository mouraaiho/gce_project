<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
      protected $table = "invoices";
      protected $primaryKey = "id";

      static function getAllUnpaidInvoices($page = 1, $perPage = 10){
        $startAt = $perPage * ($page - 1);
        $data['result'] = DB::table('clients')
        ->join('counters', 'clients.id', '=', 'counters.client_id')
        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
        ->offset($startAt)
        ->limit($perPage)
        ->select('clients.cin', 'clients.name', 'clients.subscription_fees','counters.number as cnumber' , 'consumptions.month', 'consumptions.year', 'consumptions.value', 'invoices.id', 'invoices.number as inumber', 'invoices.price', 'invoices.status')->get();
        $data['totalPages'] = ceil(count($data['result']) / $perPage);
        return $data;
      }
}
