<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

class AdminAuth extends Controller
{

    
    public function login()
    {
        return view('admin.login');
    }
    

    public function dologin()
    {
        $rememberme=request('rememberme')==1 ?true : false;
        if(auth()->guard('admin')->attempt(['email'=>request('email'),'password'=>request('password')],$rememberme)){
            return redirect('admin');
        }else{
            return redirect('admin.login');
        }
        
    }

    public function logoutadmin()
    {
        auth()->guard('admin')->logout();
        return redirect('admin/login');
    }
}

