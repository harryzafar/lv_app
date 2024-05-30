<?php

namespace App\Http\Controllers;

use App\Models\User_model;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        return view('admin.home');
    }

    public function test(){
      $user_model = new User_model();
      $User_row = $user_model->selectRow('user', ['id'=> 1]);
      print_r($User_row);
    }
}
