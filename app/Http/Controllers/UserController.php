<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function validation(Request $req)
    {
       // echo "Usercontroller";
       //return $req->input();
       $req->validate([
            'username' => 'required',
            'password' => 'required | min:5',
            'usermail' => 'required'

       ]);
       $data = $req->input('username');
       $req ->session()->flash('user',$data);
       

       $user = new user();
       $user->username = $req->username;
       $user->email = $req->usermail;
       $user->password = Hash::make($req->password);
       $user->save();
       return view('welcome');
    }
}
