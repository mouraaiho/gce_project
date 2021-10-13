<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
      protected $table = "invoices";
      protected $primaryKey = "id";

      static function getAllUnpaidInvoices($page = 1, $perPage = 30){
        $startAt = $perPage * ($page - 1);

        $records =  DB::table('clients')
        ->join('counters', 'clients.id', '=', 'counters.client_id')
        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')->get();
        
        $data['totalPages'] = ceil(count($records) / $perPage);

        $data['result'] = DB::table('clients')
        ->join('counters', 'clients.id', '=', 'counters.client_id')
        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
        ->offset($startAt)
        ->limit($perPage)
        ->select('clients.cin', 'clients.name', 'clients.subscription_fees','counters.number as cnumber' , 'consumptions.month', 'consumptions.year', 'consumptions.value', 'invoices.id', 'invoices.number as inumber', 'invoices.price', 'invoices.status')->get();
        return $data;
      }


      static function addInvoice($month, $year, $value, $consumption_id){
        $price = -10;
        $status = 0;
        DB::table('invoices')->insert(
            [
              'number' => 'FC'.$consumption_id.''.$month.''.$year,
              'consumption_id' => $consumption_id , 
              'month_consumption' => $month , 
              'year_consumption' => $year , 
              'value_consumption' => $value,
              'price' => $price,
              'status' => $status
            ]
        );
      }

      static function updateInvoice($month, $year, $value, $consumption_id){
        DB::table('invoices')
        ->Where([['consumption_id','=', $consumption_id], ['month_consumption','=', $month], ['year_consumption','=', $year]])
        ->update(
            ['value_consumption' => $value]
        );
      }
}
