<?php

namespace App\Http\Controllers;

use App\Client as Client;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    public function index(Request $request){
        $currPage = 1;
        $data = array();
        $data['clients'] = Client::getAllClients($currPage);
        $data['currPage'] = $currPage;
        $data['status'] = '';
        $data['message'] = '';
        if(!empty($request->input('success'))){
            $data['status'] = 'success';
            $data['message'] = $request->input('success');
        }elseif (!empty($request->input('error'))) {
            $data['status'] = 'error';
            $data['message'] = $request->input('error');
        }
      return view("client.list", ['data' => $data]);
    }

    public function add(Request $request){
      $status = '';
      $message = '';
      if(!empty($request->input('success'))){
          $status = 'success';
          $message = $request->input('success');
      }elseif (!empty($request->input('error'))) {
        $status = 'error';
        $message = $request->input('error');
      }
      return view("client.add",["status" => $status,"message" => $message]);
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
        if(Client::create($data)){
          return redirect()->route('client.add',['success' => 'لقد تم اضافة المشترك الجديد بنجاح']);
        }else{
          return redirect()->route('client.add',['error' => 'هناك خطأ في العملية المرجو التأكد من المعلومات']);
        }
    }


    public function edit(Request $request){
      $client = Client::findOrFail($request->input('id'));
      $status = '';
      $message = '';
      if(!empty($request->input('success'))){
          $status = 'success';
          $message = $request->input('success');
      }elseif (!empty($request->input('error'))) {
        $status = 'error';
        $message = $request->input('error');
      }
      return view("client.edit", ["client" => $client, "status" => $status,"message" => $message]);
    }

    public function update(Request $request){

        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $client = Client::findOrFail($request->input('id'));

        $client->cin = $request->input('cin');
        $client->name = $request->input('name');
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->subscription_fees = $request->input('subscription_fees');
        $client->subscription_date = $request->input('subscription_date');
        if($client->save()){
          return redirect()->route('client.edit',['id' => $client->id , 'success' => 'لقد تم تعديل معلومات المشترك الجديد بنجاح']);
        }else{
          return redirect()->route('client.edit',['id' => $client->id , 'error' => 'هناك خطأ في العملية المرجو التأكد من المعلومات']);
        }
    }

    public function delete(Request $request){
        $client = Client::findOrFail($request->input('id'));
        if($client->delete()){
          return redirect()->route('client.index',['success' => 'لقد تم حذف المشترك الجديد بنجاح']);
        }else{
          return redirect()->route('client.index',['error' => 'هناك خطأ في العملية المرجو التأكد من المعلومات']);
        }
    }
}
