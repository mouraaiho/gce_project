<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Client extends Model
{
    protected $table = "clients";
    protected $primaryKey = "id";

    public function counters(){
      return $this->hasMany(Counter::class);
    }

    static function getAllClients($page = 1, $perPage = 15, $searchField = ''){
      $startAt = $perPage * ($page - 1);
      if($searchField == ''){
        $records =  DB::table('clients')->get();
        $data['totalPages'] = ceil(count($records) / $perPage);
        $data['result'] = DB::table('clients')
        ->offset($startAt)
        ->limit($perPage)->get();
      }else{
        $records =  DB::table('clients')->orWhere('name', 'like' , '%'. $searchField .'%')->get();
        $data['totalPages'] = ceil(count($records) / $perPage);
        $data['result'] = DB::table('clients')
        ->orWhere('name' , 'like' , '%'. $searchField .'%')
        ->offset($startAt)
        ->limit($perPage)->get();
      }
     
      return $data;
    }

}
