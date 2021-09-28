<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = "clients";
    protected $primaryKey = "id";

    public function counters(){
      return $this->hasMany(Counter::class);
    }
}
