<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
class UserController extends Controller
{
    //
    public function index(){
        $currPage = 1;
        $data = array();
        $data['users'] = User::getAllUsers($currPage);
        $data['currPage'] = $currPage;
      return view("user.list", ['data' => $data]);
    }
}
