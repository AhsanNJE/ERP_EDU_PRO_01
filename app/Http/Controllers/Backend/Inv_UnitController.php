<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inv_Unit;
use Carbon\Carbon;

class Inv_UnitController extends Controller
{
    public function AllUnit(){

        $inv_unit = Inv_Unit::latest()->get();
        return view('unit.all_unit', compact('inv_unit'));

    }//End Method

    public function AddUnit(){

        return view('unit.add_unit');

    }//End Method

    public function StoreUnit(Request $request){

        Inv_Unit::insert([
            'unit_name' => $request->unitName,
            'status' => $request->unitstatus,
            'created_at' => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'Unit Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.unit')->with($notification);  

    }//End Method

    public function EditUnit($id){

        $inv_unit = Inv_Unit::findOrFail($id);
        return view("unit.edit_unit",compact("inv_unit"));

    }//End Method

    public function UpdateUnit(Request $request){

        $unitid = $request->id;

        Inv_Unit::findOrFail($unitid)->update([
            'unit_name' => $request->unitName,
            'status' => $request->unitstatus,
            'updated_at' => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'Unit Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.unit')->with($notification);  

    }//End Method

    public function DeleteUnit($id){

        Inv_Unit::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Unit Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);  

    }//End Method

        //////////////////////////////// -------Status Method------ ///////////////////////////////
        public function Status($id)
        {
            $status = Inv_Unit::findOrFail($id);
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
