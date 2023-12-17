@extends('admin.admin_master_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="card card-primary col-sm-12">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" class="" method="post" action="{{ route('update.user') }}">
                @csrf 

                <input type="hidden" name="id" value="{{ $user_info->id }}">

                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Name:</label>
                    <input type="text" name="userName" class="form-control"  id="exampleInputEmail1" value="{{ $user_info->name }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="email" name="userEmail" class="form-control"  id="exampleInputEmail1" value="{{ $user_info->email }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact:</label>
                    <input type="number" name="userContact" class="form-control"  id="exampleInputEmail1" value="{{ $user_info->contact }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender:</label>
                    <select name="userGender" class="form-control" id="exampleInputStatus" >
                        <option value="male">------Select Gender-------</option>
                        <option value="male" @if ($user_info->gender == 'male') selected @endif>Male</option>
                        <option value="femail" @if ($user_info->gender == 'femail') selected @endif>Femail</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address:</label>
                    <input type="text" name="userAddress" class="form-control"  id="exampleInputEmail1" value="{{ $user_info->address }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Select Category Name:</label>
                    <select name="cat_id" class="form-control" id="exampleInputStatus">
                    @foreach($userCategory as $ucat)
                        <option value="{{ $ucat->id }}">{{ $ucat->category_name }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="userPassword" class="form-control"  id="exampleInputEmail1" value="{{ $user_info->password }}">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm_Password</label>
                    <input type="password" name="userConfirm_Password" class="form-control"  id="exampleInputEmail1" value="{{ $user_info->confirm_password }}">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputStatus">Status</label>
                    <select name="userStatus" class="form-control" id="exampleInputStatus">
                        <option value="1">------Select Status-------</option>
                        <option value="1" @if ($user_info->status == 1) selected @endif>Active</option>
                        <option value="2" @if($user_info->status==2)selected @endif>Inactive</option>
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