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
            return redirect('adminDashboard');
        }else {
            return "Incorrect username or password";
        }
        // $data = $req->input();
        // $req->session()->put('email', $data['email']);
        // return redirect('adminDashboard');
        
        if(session()->has('email')){
            return redirect('adminDashboard');
        }
        else{
            return redirect('admin');
        }
        
    }

    function logout(){
        if(session()->has('email'))
            session()->pull('email');
        return redirect('admin');
    }
}
