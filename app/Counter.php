<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
