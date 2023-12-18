@extends('admin.admin_master_dashboard')
@section('admin')

<div class="card card-primary col-sm-8">
              <div class="card-header">
                <h3 class="card-title">Edit Unit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" class="" method="post" action="{{ route('update.unit') }}">
                @csrf 
                <input type="hidden" name="id" value="{{ $inv_unit->id }}">

                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Unit Name</label>
                    <input type="text" name="unitName" class="form-control" value="{{ $inv_unit->unit_name }}" id="exampleInputEmail1">
                  </div>
        
                  <div class="form-group">
                    <label for="exampleInputStatus">Status</label>
                    <select name="unitstatus" class="form-control mt-2" id="exampleInputStatus">
                        <option value="0">------Select Status-------</option>
                        <option value="1" @if($inv_unit->status==1)selected @endif>Active</option>
                        <option value="2" @if($inv_unit->status==2)selected @endif>Inactive</option>
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