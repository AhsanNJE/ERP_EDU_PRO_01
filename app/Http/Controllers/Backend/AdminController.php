<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{

    public function Index(){

        return view('admin.admin_login');

    }//End Method

    public function Dashboard(){

        return view('admin.admin_master_dashboard');

    }//End Method

    public function Login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])){
            return redirect()->route('admin.dashboard')->with('error', 'Admin Login Successfully');
        }else{
            return back()->with('error', 'Invalid Email Or Password');
        }

    }//End Method

    public function AdminLogout(){

        Auth::guard('admin')->logout();
        return redirect()->route('login_from')->with('success', 'Admin Logout Successfully');

    }//End Method
    public function AdminRegister(){

        return view('admin.admin_register');

    }//End Method

    public function AdminRegisterCreate(Request $request){
        // dd($request->all());

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        
        return redirect()->route('login_from')->with('success', 'Admin Register Successfully');
    }//End Method


}
