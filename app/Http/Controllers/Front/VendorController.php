<?php

namespace App\Http\Controllers\Front;

use Validator;
use App\Models\Vendors;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class VendorController extends Controller
{
    //
    public function Signup(){

        return view('vendors.innerpage.register');
    }

    public function Register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            //Validate Vendor
            $rules=[
                "fname" => "required",
                "lname" => "required",
                "email" => "required|email|unique:admins|unique:vendors",
                "mobile" => "required|numeric|unique:admins|unique:vendors",
                "password" => "required",
            ];
            $customerMessage = [
                "fname.required" => "First Name is required",
                "lname.required" => "Last Name is required",
                "email.required" => "Email is required",
                "email.unique" => "Email already exists",
                "mobile.required" => "Mobile already exists",
                "mobile.unique" => "Mobile already exists",
            ];
            $validator = Validator::make($data,$rules,$customerMessage);
            if($validator->fails()){
                return Redirect::back()->withErrors($validator);
            }
        }
        // return view('vendors.innerpage.register');
        //Create Vendor Account
        $vendor = new vendors;
        $vendor->fname = $data['fname'];
        $vendor->lname = $data['lname'];
        $vendor->email = $data['email'];
        $vendor->mobile = $data['mobile'];
        $vendor->password = Hash::make($data['password']);
        $vendor->status = $data['status'];;
        $vendor->save();
        return Redirect::back()->with('successmessage', 'Data is save');
    }

    public function loginpage(){
        return view('vendors.innerpage.login');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::guard('vendors')->attempt(['email'=>$data['email'], 'password'=>$data['password'], 'status'=>'1'])){
                return redirect('vendor/dashboard');
            }else{
                return redirect()->back()->with('error_message','username and password not correct');
            }
        }
        return view('vendors.innerpage.login');
    }
    public function logout()
    {
        Auth::guard('vendors')->logout();
        return redirect('vendor/login')->with('success_message','logout successfully');
    }

    public function dashboard(){
        return view('vendors.innerpage.vendordashboard');
    }
}
