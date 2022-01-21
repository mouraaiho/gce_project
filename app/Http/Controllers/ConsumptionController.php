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

    public function printMonthConsumption(Request $request){
          $month   = $request->input('month');
          $year   = $request->input('year');
          $data['consumptions'] = Consumption::getAllConsumptions(1,4000, $month, $year);
          return view("consumption.print_list_month_consumption", ['data' => $data ,'year'=>$year,'month'=>$month]);

    }
}
