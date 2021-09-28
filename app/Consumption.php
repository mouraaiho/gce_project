<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
