<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    function index(){
        return view('admin');
    }

    function show(){
        if(session()->has('email')){
            return view('adminDashboard');
        }
        else{
            return redirect('admin');
        }
    }

    function login(Request $req){
        if($req->email == "admin@gmail.com" && $req->password == "password"){
            $req->session()->put('email', $req->email);
            return redirect('adminDashboard');
        }else {
            return "Incorrect username or password";
        }

        // $data = $req->input();
        // if($data['email']=="admin@gmail.com" && $data['password'] == "password"){
        //     $req->session()->put('email', $data['email']);
        //     return redirect('adminDashboard');        
        // }else{
        //     return "Incorrect username or password";
        // }
    }

    function logout(){
        if(session()->has('email'))
            session()->pull('email');
        return redirect('admin');
    }
}
