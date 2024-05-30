<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
  public function index()
  {
    return view('admin.login');
  }

  public function authentication(Request $request)
  {

    $email = $request->email;
    $password = $request->password;

    $credentials = [
      'email' => $email,
      'password' => $password
    ];



    $validator = Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if ($validator->passes()) {
      $credentials = [
        'email' => $email,
        'password' => $password
      ];

      //authentication start
      if (Auth::attempt($credentials)) {

        if (Auth::user()->is_active) {

          $request->session()->regenerate();

          // You might want to redirect the user to another page after successful login
          return redirect()->route('home');


          
        } else {
          Auth::logout();
          return redirect()->back()->withInput()->with('error', 'You are not Authorized User');
         
        }
      } else {
        return redirect()->back()->withInput()->with('error', 'Incorrect Email or Password');
      }
    } else {

      return redirect()->back()->withInput()->withErrors($validator);
    }
  }




  public function signup()
  {
    return view('admin.signup');
  }

  public function registration(Request $request)
  {

    $full_name = $request->full_name;
    $email = $request->email;
    $password = $request->password;

    $validator = Validator::make($request->all(), [
      'full_name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required',
    ]);

    if ($validator->passes()) {
      $data['name'] = $full_name;
      $data['email'] = $email;
      $data['password'] = Hash::make($password);
      $insert = User::create($data);

      if ($insert) {
        return redirect()->route('login')->with('success', 'Registration successful. You can now login.');
      } else {
        return redirect() - back()->withInput()->with('error', 'Registration failed. Please try again.');
      }
    } else {

      return redirect()->back()->withInput()->withErrors($validator);
    }
  }

  public function logout(Request $request)
  {
    Auth::logout(); // Logout the authenticated user

    // Invalidate the session and regenerate CSRF token
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect the user to the login page or any other desired location
    return redirect('/login');
  }
}
