@extends('admin.admin_master_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="card card-primary col-sm-12">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" class="" method="post" action="{{ route('store.user') }}">
                @csrf 
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Name:</label>
                    <input type="text" name="userName" class="form-control"  id="exampleInputEmail1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email:</label>
                    <input type="email" name="userEmail" class="form-control"  id="exampleInputEmail1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact:</label>
                    <input type="number" name="userContact" class="form-control"  id="exampleInputEmail1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender:</label>
                    <select name="userGender" class="form-control" id="exampleInputStatus">
                        <option value="male">------Select Gender-------</option>
                        <option value="male">Male</option>
                        <option value="femail">Femail</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address:</label>
                    <input type="text" name="userAddress" class="form-control"  id="exampleInputEmail1">
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
                    <input type="password" name="userPassword" class="form-control"  id="exampleInputEmail1">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm_Password</label>
                    <input type="password" name="userConfirm_Password" class="form-control"  id="exampleInputEmail1">
                  </div>
                
                  <div class="form-group">
                    <label for="exampleInputStatus">Status</label>
                    <select name="userStatus" class="form-control" id="exampleInputStatus">
                        <option value="1">------Select Status-------</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>



  <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
              userName: {
                    required : true,
                },
                userEmail: {
                    required : true,
                }, 
                userContact: {
                    required : true,
                }, 
                userGender: {
                    required : true,
                }, 
                userAddress: {
                    required : true,
                }, 
                userPassword: {
                    required : true,
                }, 
                userConfirm_Password: {
                    required : true,
                }, 
                
            },
            messages :{
              userName: {
                    required : 'Please Enter User Name',
                }, 
                userEmail: {
                    required : 'Please Enter User Email',
                }, 
                userContact: {
                    required : 'Please Enter User Contact',
                }, 
                userGender: {
                    required : 'Please Enter User Gender',
                }, 
                userAddress: {
                    required : 'Please Enter User Address',
                }, 
                userPassword: {
                    required : 'Please Enter User Password',
                }, 
                userConfirm_Password: {
                    required : 'Please Enter User Confirm_Password',
                }, 
                 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
@endsection