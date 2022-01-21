<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice as Invoice;
use App\User as User;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public function index(Request $request){
     //  User::create([
     //     'name' => 'Supe Admin',
     //     'email' => 'super@admin.com',
     //     'password' => Hash::make('admin'),
     // ]);
      $currPage = 1;
      $data = array();
      $data['invoices'] = Invoice::getAllUnpaidInvoices($currPage);
      $data['currPage'] = $currPage;
      return view("dashboard.home", ['data' => $data ]);
    }

}
