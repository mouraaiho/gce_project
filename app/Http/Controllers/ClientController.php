<?php

namespace App\Http\Controllers;

use App\Client as Client;
class ClientController extends Controller
{
    public function index(){
        $currPage = 1;
        $data = array();
        $data['clients'] = Client::getAllClients($currPage);
        $data['currPage'] = $currPage;
      return view("client.list", ['data' => $data]);
    }
}
