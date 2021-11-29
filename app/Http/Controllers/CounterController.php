<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Counter as Counter;
use App\Client as Client;
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

    public function add(Request $request){
      $status = '';
      $message = '';
      $clients = Client::all();
      if(!empty($request->input('success'))){
          $status = 'success';
          $message = $request->input('success');
      }elseif (!empty($request->input('error'))) {
        $status = 'error';
        $message = $request->input('error');
      }
      return view("counter.add",["clients" => $clients, "status" => $status,"message" => $message]);
    }


    public function save(Request $request){

        $request->validate([
            'number' => 'required',
            'active' => 'required',
            'itial_consumption' => 'required',
            'client_id' => 'required',
        ]);
        $data = array(
            'client_id' => $request->input('client_id'),
            'number' => $request->input('number'),
            'active' => $request->input('active'),
            'start_date' => $request->input('start_date'),
            'itial_consumption' => $request->input('itial_consumption'),
            'end_date' => $request->input('end_date'),
        );

        if(Counter::create($data)){
          return redirect()->route('counter.add',['success' => 'لقد تم اضافة العداد الجديد بنجاح']);
        }else{
          return redirect()->route('counter.add',['error' => 'هناك خطأ في العملية المرجو التأكد من المعلومات']);
        }
    }

    public function edit(Request $request){
      $counter = Counter::findOrFail($request->input('id'));
      $clients = Client::all();
      $status = '';
      $message = '';
      if(!empty($request->input('success'))){
          $status = 'success';
          $message = $request->input('success');
      }elseif (!empty($request->input('error'))) {
        $status = 'error';
        $message = $request->input('error');
      }
      return view("counter.edit", ["clients" => $clients ,"counter" => $counter, "status" => $status,"message" => $message]);
    }

    public function update(Request $request){

        $request->validate([
            'number' => 'required',
            'active' => 'required',
            'itial_consumption' => 'required',
            'client_id' => 'required',
        ]);

        $counter = Counter::findOrFail($request->input('id'));

        $counter->client_id = $request->input('client_id');
        $counter->number = $request->input('number');
        $counter->active = $request->input('active');
        $counter->start_date = $request->input('start_date');
        $counter->itial_consumption = $request->input('itial_consumption');
        $counter->end_date = $request->input('end_date');
        if($counter->save()){
          return redirect()->route('counter.edit',['id' => $counter->id , 'success' => 'لقد تم تعديل معلومات العداد بنجاح']);
        }else{
          return redirect()->route('counter.edit',['id' => $counter->id , 'error' => 'هناك خطأ في العملية المرجو التأكد من المعلومات']);
        }
    }

    public function delete(Request $request){
        $counter = Counter::findOrFail($request->input('id'));
        if($counter->delete()){
          return redirect()->route('counter.index',['success' => 'لقد تم حذف العداد بنجاح']);
        }else{
          return redirect()->route('counter.index',['error' => 'هناك خطأ في العملية المرجو التأكد من المعلومات']);
        }
    }



}
