@extends('admin.admin_master_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="card card-primary col-sm-8">
              <div class="card-header">
                <h3 class="card-title">Add User Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" class="" method="post" action="{{ route('store.usercategory') }}">
                @csrf 
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Category Name</label>
                    <input type="text" name="ucName" class="form-control"  id="exampleInputEmail1">
                  </div>
        
                  <div class="form-group">
                    <label for="exampleInputStatus">Status</label>
                    <select name="ucstatus" class="form-control mt-2" id="exampleInputStatus">
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
              ucName: {
                    required : true,
                }, 
                
            },
            messages :{
              ucName: {
                    required : 'Please Enter User Category Name',
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