<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::guard('admins')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'1'])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_message','username and password not correct');
            }
        }
        return view('admin.adminlogin');
    }
    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect('admin/login')->with('success_message','logout successfully');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
}
