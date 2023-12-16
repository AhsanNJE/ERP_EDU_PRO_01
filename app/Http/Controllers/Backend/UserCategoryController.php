<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_Category;
use Carbon\Carbon;

class UserCategoryController extends Controller
{
    public function AllUserCategory(){

        $usercategory = User_Category::latest()->get();
        return view('usercategory.all_usercategory', compact('usercategory'));

    }//End Method

    public function AddUserCategory(){

        return view('usercategory.add_usercategory');

    }//End Method

    public function StoreUserCategory(Request $request){

        User_Category::insert([
            'category_name' => $request->ucName,
            'status' => $request->ucstatus,
            'created_at' => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'User Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.usercategory')->with($notification);  

    }//End Method

    public function EditUserCategory($id){

        $usercategory = User_Category::findOrFail($id);
        return view("usercategory.edit_usercategory",compact("usercategory"));

    }//End Method

    public function UpdateUserCategory(Request $request){

        $cid = $request->id;

        User_Category::findOrFail($cid)->update([
            'category_name' => $request->ucName,
            'status' => $request->ucstatus,
            'created_at' => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'User Category Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.usercategory')->with($notification);  

    }//End Method

    public function DeleteUserCategory($id){

        User_Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'User Category Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);  

    }//End Method



    //////////////////////////////// -------Status Method------ ///////////////////////////////
    public function Status($id)
    {
        $status = User_Category::find($id);
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
