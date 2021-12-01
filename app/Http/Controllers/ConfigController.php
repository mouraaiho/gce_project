<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config as Config;
class ConfigController extends Controller
{
    //
    public function index(){
        $data = array();
        $data['config'] = Config::getConfig();
      return view("config.list", ['data' => $data]);
    }
}
