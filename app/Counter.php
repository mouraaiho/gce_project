<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Counter extends Model
{
    protected $table = "counters";
    protected $primaryKey = "id";

    public function client(){
      return $this->belongsTo(Client::class);
    }

    public function consumptions(){
      return $this->hasMany(Consumption::class);
    }

    static function getAllCounters($page = 1, $perPage = 15, $searchField = ''){
      $startAt = $perPage * ($page - 1);
      if($searchField == ''){
        $records =  DB::table('counters')->get();
        $data['totalPages'] = ceil(count($records) / $perPage);
        $data['result'] = DB::table('counters')
        ->select('clients.id as clientId', 'counters.id as counterId', 'clients.name', 'clients.cin', 'counters.number', 'counters.itial_consumption', 'counters.start_date', 'counters.active', 'counters.end_date')
        ->join('clients', 'clients.id', '=', 'counters.client_id')
        ->offset($startAt)
        ->limit($perPage)->get();
      }else{
        $records =  DB::table('counters')->join('clients', 'clients.id', '=', 'counters.client_id')->orWhere('name', 'like' , '%'. $searchField .'%')->get();
        $data['totalPages'] = ceil(count($records) / $perPage);
        $data['result'] = DB::table('counters')
        ->select('clients.id as clientId', 'counters.id as counterId', 'clients.name', 'clients.cin', 'counters.number', 'counters.itial_consumption', 'counters.start_date', 'counters.active', 'counters.end_date')
        ->join('clients', 'clients.id', '=', 'counters.client_id')
        ->orWhere('name' , 'like' , '%'. $searchField .'%')
        ->offset($startAt)
        ->limit($perPage)->get();
      }
      return $data;
    }
}
