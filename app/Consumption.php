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

    static function getAllConsumptions($page = 1, $perPage = 15, $month = 1 ,$year = 2020){

      $counters = Counter::getAllCounters($page, $perPage);
      $data["result"]  = array();
      $data['totalPages'] = $counters['totalPages'];
      foreach($counters['result'] as $d){
        if($month > 1){
          $lastconsumption = DB::table('consumptions')
          ->Where('year' , $year)
          ->Where('month' , ($month - 1))
          ->Where('counter_id' , $d->counterId)
          ->get();
  
          $thisconsumption = DB::table('consumptions')
          ->Where('year' , $year)
          ->Where('month' , $month)
          ->Where('counter_id' , $d->counterId)
          ->get();
        }else{
          $lastconsumption = DB::table('consumptions')
          ->Where('year' , ($year - 1))
          ->Where('month' , 12)
          ->Where('counter_id' , $d->counterId)
          ->get();

          $thisconsumption = DB::table('consumptions')
          ->Where('year' , $year)
          ->Where('month' , $month)
          ->Where('counter_id' , $d->counterId)
          ->get();
        }
        

        $row = array();
        $row['counter_id'] = $d->counterId;
        $row['number'] = $d->number;
        $row['cin'] = $d->cin;
        $row['name'] = $d->name;
        $row['lastconsumption'] = (($lastconsumption->isEmpty()) ? '' : $lastconsumption[0]->value);
        $row['thisconsumption'] = (($thisconsumption->isEmpty()) ? '' : $thisconsumption[0]->value);

        array_push($data['result'], $row);
      }
      return $data;
    }

    static function getConsumptionByCounterMonthYear($counter_id, $month , $year){
      $consumption = DB::table('consumptions')
      ->where([['counter_id','=', $counter_id], ['month','=', $month], ['year','=', $year]])
      ->get();
      return $consumption;
    }

    static function AddConsumption($counter_id, $month , $year , $value){
     return  DB::table('consumptions')->insertGetId(
            [
              'counter_id' => $counter_id , 
              'month' => $month , 
              'year' => $year , 
              'value' => $value,
            ]
        );
    }

    static function updateConsumption($value, $consumption_id){
      DB::table('consumptions')
        ->Where('id' , $consumption_id)
        ->update(
            ['value' => $value]
        );
    }
}
