<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client as Client;
class ClientController extends Controller
{
    public function index(Request $request){
        $currPage = 1;
        $data = array();
        $data['clients'] = Client::getAllClients($currPage);
        $data['currPage'] = $currPage;
      return view("client.list", ['data' => $data]);
    }
}
