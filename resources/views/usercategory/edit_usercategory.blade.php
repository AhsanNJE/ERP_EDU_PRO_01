@extends('admin.admin_master_dashboard')
@section('admin')

<div class="card card-primary col-sm-8">
              <div class="card-header">
                <h3 class="card-title">Edit User Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" class="" method="post" action="{{ route('update.usercategory') }}">
                @csrf 
                <input type="hidden" name="id" value="{{ $usercategory->id }}">

                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Category Name</label>
                    <input type="text" name="ucName" class="form-control" value="{{ $usercategory->category_name }}" id="exampleInputEmail1">
                  </div>
        
                  <div class="form-group">
                    <label for="exampleInputStatus">Status</label>
                    <select name="ucstatus" class="form-control mt-2" id="exampleInputStatus">
                        <option value="0">------Select Status-------</option>
                        <option value="1" @if($usercategory->status==1)selected @endif>Active</option>
                        <option value="2" @if($usercategory->status==2)selected @endif>Inactive</option>
                    </select>
                </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>

@endsection