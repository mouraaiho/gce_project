<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumption as Consumption;
class ConsumptionController extends Controller
{
    //
    public function index(){
        $currPage = 1;
        $data = array();
        $data['consumptions'] = Consumption::getAllConsumptions($currPage);
        $data['currPage'] = $currPage;
      return view("consumption.list", ['data' => $data]);
    }
}
