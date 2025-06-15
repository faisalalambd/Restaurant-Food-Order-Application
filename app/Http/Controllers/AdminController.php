<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminLogin(){
        return view('admin.login');
    } //End Method

    public function AdminDashboard(){
        return view('admin.dashboard');
    } //End Method

    public function AdminLoginSubmit(Request $request){
        
    } //End Method
}
