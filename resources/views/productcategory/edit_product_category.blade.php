@extends('admin.admin_master_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

 <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Edit Category </a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Edit Category</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

<div class="row">


  <div class="col-lg-8 col-xl-12">
<div class="card">
    <div class="card-body">





    <!-- end timeline content-->

    <div class="tab-pane" id="settings">
        <form method="post" action="{{ route('product.category.update') }}" >
        	@csrf

            <input type="hidden" name="id" value="{{ $productcategory->id }}">

            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Edit Category</h5>

            <div class="row">


    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Category Name</label>
            <input type="text" name="category_name" class="form-control" value="{{ $productcategory->product_category_name }}"   >

        </div>
    </div>

    <div class="col-md-6">
    <div class="mb-3">
        <label for="exampleInputStatus">Status</label>
        <select name="categorystatus" class="form-control" id="exampleInputStatus">
            <option value="0">------Select Status-------</option>
            <option value="1" @if($productcategory->status==1)selected @endif>Active</option>
            <option value="2" @if($productcategory->status==2)selected @endif>Inactive</option>
        </select>
        </div>
    </div>


            </div> <!-- end row --> 

            <div class="text-end">
                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i>Update</button>
            </div>
        </form>
    </div>
    <!-- end settings content-->


                                    </div>
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->
@endsection