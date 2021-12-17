<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
      protected $table = "invoices";
      protected $primaryKey = "id";


      static function getAllInvoices($page = 1, $perPage = 15, $searchField = ''){
        $startAt = $perPage * ($page - 1);
        if($searchField == ''){
          $records =  DB::table('clients')
                        ->join('counters', 'clients.id', '=', 'counters.client_id')
                        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                        ->orderByRaw('CAST(counters.number AS int)', 'asc')->get();

                        $data['totalPages'] = ceil(count($records) / $perPage);

                        $data['result'] = DB::table('clients')
                        ->join('counters', 'clients.id', '=', 'counters.client_id')
                        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                        ->offset($startAt)
                        ->limit($perPage)
                        ->select('clients.cin', 'clients.name', 'clients.subscription_fees','counters.number as cnumber' , 'consumptions.month', 'consumptions.year', 'consumptions.value', 'invoices.id', 'invoices.number as inumber', 'invoices.price', 'invoices.status')
                        ->orderByRaw('CAST(counters.number AS int)', 'asc')->get();

        }else{
          $records =  DB::table('clients')
                        ->join('counters', 'clients.id', '=', 'counters.client_id')
                        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                        ->orderByRaw('CAST(counters.number AS int)', 'asc')->get();

                        $data['totalPages'] = ceil(count($records) / $perPage);

                        $data['result'] = DB::table('clients')
                        ->join('counters', 'clients.id', '=', 'counters.client_id')
                        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                        ->offset($startAt)
                        ->limit($perPage)
                        ->orWhere('clients.name' , 'like' , '%'. $searchField .'%')
                        ->orWhere('counters.number' , 'like' , '%'. $searchField .'%')
                        ->orWhere('invoices.number' , 'like' , '%'. $searchField .'%')
                        ->select('clients.cin', 'clients.name', 'clients.subscription_fees','counters.number as cnumber' , 'consumptions.month', 'consumptions.year', 'consumptions.value', 'invoices.id', 'invoices.number as inumber', 'invoices.price', 'invoices.status')
                        ->orderByRaw('CAST(counters.number AS int)', 'asc')->get();

        }
        return $data;
      }

      static function getAllUnpaidInvoices($page = 1, $perPage = 30){
        $startAt = $perPage * ($page - 1);

        $records =  DB::table('clients')
        ->join('counters', 'clients.id', '=', 'counters.client_id')
        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
        ->orderByRaw('CAST(counters.number AS int)', 'asc')->get();

        $data['totalPages'] = ceil(count($records) / $perPage);

        $data['result'] = DB::table('clients')
        ->join('counters', 'clients.id', '=', 'counters.client_id')
        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
        ->offset($startAt)
        ->limit($perPage)
        ->select('clients.cin', 'clients.name', 'clients.subscription_fees','counters.number as cnumber' , 'consumptions.month', 'consumptions.year', 'consumptions.value', 'invoices.id', 'invoices.number as inumber', 'invoices.price', 'invoices.status')
        ->orderByRaw('CAST(counters.number AS int)', 'asc')->get();

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

      static function getInvoicesBy($page = 1, $year , $month , $client_name, $counter_number, $invoice_number, $type_invoice){
        $perPage = 15;
        $startAt = $perPage * ($page - 1);
        $orWhere = [];
        $where = [];
        if($month != ''){
          $where[] = ['invoices.month_consumption', "=", $month ];
        }
        if($year != ''){
          $where[] = ['invoices.year_consumption', "=", $year ];
        }
        if($type_invoice != ''){
          $where[] = ["invoices.status", "=", $type_invoice ];
        }
        if($client_name != ''){
          $where[] = ["clients.name","like", "%{$client_name}%" ];
        }
        if($counter_number != ''){
          $where[] = ["counters.number", "=",  $counter_number  ];
        }
        if($invoice_number != ''){
          $where[] = ["invoices.number", "=",  $invoice_number  ];
        }
        $records =  DB::table('clients')
                      ->join('counters', 'clients.id', '=', 'counters.client_id')
                      ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                      ->where($where)
                      ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                      ->orderByRaw('CAST(counters.number AS int)', 'asc')->get();
        $data['totalPages'] = ceil(count($records) / $perPage);
        $data['result'] = DB::table('clients')
                      ->join('counters', 'clients.id', '=', 'counters.client_id')
                      ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                      ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                      ->where($where)
                      ->offset($startAt)
                      ->limit($perPage)
                      ->select('clients.cin', 'clients.name', 'clients.subscription_fees','counters.number as cnumber' , 'consumptions.month', 'consumptions.year', 'consumptions.value', 'invoices.id', 'invoices.number as inumber', 'invoices.price', 'invoices.status')
                      ->orderByRaw('CAST(counters.number AS int)', 'asc')->get();

        return $data;
      }


      static function checkInvoiceCounterNumber($invoiceList){
        if ($invoiceList == '') {
          return false;
        }else{
          $invoiceList = rtrim(str_replace(";",",",$invoiceList),",");
          $idList = explode(',', $invoiceList);
          $records =  DB::table('clients')
                        ->join('counters', 'clients.id', '=', 'counters.client_id')
                        ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                        ->whereIn('invoices.id', $idList)
                        ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                        ->select('counters.number')
                        ->groupBy('counters.number')
                        ->get();
          if(count($records) == 1){
            return true;
          }else {
            return false;
          }
        }
      }

      static function getInvoiceById($invoiceList){
        $invoiceList = rtrim(str_replace(";",",",$invoiceList),",");
        $idList = explode(',', $invoiceList);
        $records =  DB::table('clients')
                      ->join('counters', 'clients.id', '=', 'counters.client_id')
                      ->join('consumptions', 'counters.id', '=', 'consumptions.counter_id')
                      ->whereIn('invoices.id', $idList)
                      ->join('invoices', 'consumptions.id', '=', 'invoices.consumption_id')
                      ->select('clients.cin', 'clients.name', 'clients.subscription_fees','counters.number as cnumber' , 'consumptions.month', 'consumptions.year', 'consumptions.value', 'invoices.id', 'invoices.number as inumber', 'invoices.price', 'invoices.status')
                      ->get();
        return $records;
      }

      static function UpdateStatus($invoice_id){
        DB::table('invoices')
        ->Where([['id','=', $invoice_id]])
        ->update(
            ['status' => 1]
        );
      }

}
