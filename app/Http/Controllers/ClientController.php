<?php

namespace App\Http\Controllers;

use App\Client as Client;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    public function index(){
        $currPage = 1;
        $data = array();
        $data['clients'] = Client::getAllClients($currPage);
        $data['currPage'] = $currPage;
      return view("client.list", ['data' => $data]);
    }
    public function add(){
      return view("client.add");
    }

    public function save(Request $request){

        $request->validate([
            'name' => 'required',
        ]);
        $data = array(
            'cin' => $request->input('cin'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'subscription_fees' => $request->input('subscription_fees'),
            'subscription_date' => $request->input('subscription_date'),
        );
        Client::create($data);

        return redirect()->route('client.add')->with('success', 'Product created successfully.');
    }
}
