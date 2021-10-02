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

    static function getAllClients($page = 1, $perPage = 15, $where = array()){
      $startAt = $perPage * ($page - 1);

      
      if(empty($where)){
        $records =  DB::table('clients')->get();
        $data['totalPages'] = ceil(count($records) / $perPage);
        $data['result'] = DB::table('clients')
        ->offset($startAt)
        ->limit($perPage)->get();
      }else{
        $records =  DB::table('clients')->where($where)->get();
        $data['totalPages'] = ceil(count($records) / $perPage);
        $data['result'] = DB::table('clients')
        ->where($where)
        ->offset($startAt)
        ->limit($perPage)->get();
      }
     
      return $data;
    }

}
