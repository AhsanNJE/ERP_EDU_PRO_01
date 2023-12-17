<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_info;
use Carbon\Carbon;
use App\Models\User_Category;

class UserController extends Controller
{
    public function AllUser(){

        $user_info = User_info::latest()->get();
        return view('user.all_user', compact('user_info'));

    }//End Method

    public function AddUser(){

        $userCategory = User_Category::all(); // using eloquent orm
        return view('user.add_user',compact('userCategory'));

    }//End Method

    public function StoreUser(Request $request){

        User_info::insert([
            'name' => $request->userName,
            'email' => $request->userEmail,
            'contact' => $request->userContact,
            'gender' => $request->userGender,
            'address' => $request->userAddress,
            'category_id' => $request->cat_id,
            'password' => $request->userPassword,
            'confirm_password' => $request->userConfirm_Password,
            'status' => $request->userStatus,
            'created_at' => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.user')->with($notification);  

    }//End Method

    public function EditUser($id){

        $userCategory = User_Category::all();
        $user_info = User_info::findOrFail($id);
        return view("user.edit_user",compact('user_info', 'userCategory'));

    }//End Method

    public function UpdateUser(Request $request){

        $usrid = $request->id;

        User_info::findOrFail($usrid)->update([
            'name' => $request->userName,
            'email' => $request->userEmail,
            'contact' => $request->userContact,
            'gender' => $request->userGender,
            'address' => $request->userAddress,
            'category_id' => $request->cat_id,
            'password' => $request->userPassword,
            'confirm_password' => $request->userConfirm_Password,
            'status' => $request->userStatus,
            'updated_at' => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'User Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.user')->with($notification);  


    }//End Method

    public function DeleteUser($id){

        User_info::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);  

    }//End Method


    ///////////////////////////////////////// Status Method ///////////////////////////////////////

    public function Status($id)
    {
        $status = User_info::find($id);
        if($status->status==1){
            $status->status=2;
        }
        else{
            $status->status=1;
        }
        $status->update();
        return redirect()->back();
    }
}
