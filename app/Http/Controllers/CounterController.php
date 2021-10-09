<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counter as Counter;
class CounterController extends Controller
{
    //
    public function index(){
        $currPage = 1;
        $data = array();
        $data['counters'] = Counter::getAllCounters($currPage);
        $data['currPage'] = $currPage;
      return view("counter.list", ['data' => $data]);
    }
}
