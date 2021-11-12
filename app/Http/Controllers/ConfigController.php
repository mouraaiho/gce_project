<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    public function index(){
        $data = array();
        //$data['config'] = Config::getConfig();
      return view("config.list", ['data' => $data]);
    }
}
