<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Config extends Model
{
    //
    protected $table = "configs";
    protected $primaryKey = "id";

    static function getConfig(){
      return  DB::table('configs')->get();;
    }

    static function getConfigByName($name){
      return  DB::table('configs')->Where('name' , $name)->first();
    }

    static function updateConfig($name, $value){
      DB::table('configs')
        ->Where('name' , $name)
        ->update(
            ['value' => $value]
        );
    }

}
