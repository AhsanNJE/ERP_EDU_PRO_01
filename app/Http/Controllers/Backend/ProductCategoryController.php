<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product_Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductCategoryController extends Controller
{
    public function AllProductCategory(){

        $productcategory = Product_Category::latest()->get();
        return view('productcategory.all_product_category', compact('productcategory'));

    }//End Method

    public function ProductCategoryStore(Request $request){

        Product_Category::insert([
            'product_category_name' => $request->category_name,
            'status' => $request->categorystatus,
            'created_at' => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'Product Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product.category')->with($notification);  

    }//End Method

    public function EditProductCategory($id){

        $productcategory = Product_Category::findOrFail($id);
        return view("productcategory.edit_product_category",compact("productcategory"));

    }//End Method

    public function ProductCategoryUpdate(Request $request){

        $pcid = $request->id;

        Product_Category::findOrFail($pcid)->update([
            'product_category_name' => $request->category_name,
            'status' => $request->categorystatus,
            'updated_at' => Carbon::now(),
        ]);

         $notification = array(
            'message' => 'Product Category Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product.category')->with($notification);  

    }//End Method

    public function DeleteProductCategory($id){

        Product_Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Category Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);  

    }//End Method

    //////////////////////////////// -------Status Method------ ///////////////////////////////
        public function ProductCategoryStatus($id)
        {
            $status = Product_Category::find($id);
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
