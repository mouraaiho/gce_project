<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Consumption extends Model
{
    protected $table = "consumptions";
    protected $primaryKey = "id";

    public function counter(){
      return $this->belongsTo(Counter::class);
    }

    public function invoices(){
      return $this->hasMany(Invoice::class);
    }

    static function getAllConsumptions($page = 1, $perPage = 15, $month = 3 ,$year = 2021){

      $counters = Counter::getAllCounters($page, $perPage);
      $data["result"]  = array();
      $data['totalPages'] = $counters['totalPages'];
      foreach($counters['result'] as $d){
        if($month > 1){
          $lastconsumption = DB::table('consumptions')
          ->Where('year' , $year)
          ->Where('month' , ($month - 1))
          ->Where('counter_id' , $d->number)
          ->get();
  
          $thisconsumption = DB::table('consumptions')
          ->Where('year' , $year)
          ->Where('month' , $month)
          ->Where('counter_id' , $d->number)
          ->get();
        }else{
          $lastconsumption = DB::table('consumptions')
          ->Where('year' , ($year - 1))
          ->Where('month' , 12)
          ->Where('counter_id' , $d->number)
          ->get();

          $thisconsumption = DB::table('consumptions')
          ->Where('year' , $year)
          ->Where('month' , $month)
          ->Where('counter_id' , $d->number)
          ->get();
        }
        

        $row = array();
        $row['number'] = $d->number;
        $row['cin'] = $d->cin;
        $row['name'] = $d->name;
        $row['lastconsumption'] = (($lastconsumption->isEmpty()) ? '' : $lastconsumption[0]->value);
        $row['thisconsumption'] = (($thisconsumption->isEmpty()) ? '' : $thisconsumption[0]->value);

        array_push($data['result'], $row);
      }

     
      return $data;
    }
}
