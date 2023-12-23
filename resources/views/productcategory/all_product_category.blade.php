@extends('admin.admin_master_dashboard')
@section('admin')

<div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#signup-modal">Add Category</button>   
                                        </ol>
                                    </div>
                                    <h4 class="page-title">All Product Category</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Sl</th> 
                                <th>Category Name </th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>


        <tbody>
        	@foreach($productcategory as $key=> $item)
            <tr>
                <td>{{ $key+1 }}</td> 
                <td>{{ $item->product_category_name }}</td> 
                <td>
            @if($item->status==1)
            <a href="{{ route('product.category.status',$item->id) }}" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i>Active</a>
            @else
            <a href="{{ route('product.category.status',$item->id) }}" class="btn btn-danger btn-sm">Inactive</a>
            @endif
                </td> 
                <td>
            <a href="{{ route('edit.product.category',$item->id) }}" class="btn btn-info rounded-pill waves-effect waves-light">Edit</a>
            <a href="{{ route('delete.product.category',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->




                    </div> <!-- container -->

                </div> <!-- content -->

           <!-- Signup modal content -->
    <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
    
                <div class="modal-body"> 
    
        <form class="px-3" method="post" action="{{ route('product.category.store') }}">
                        @csrf
    
                        <div class="mb-3">
                    <label for="username" class="form-label">Category Name</label>
            <input class="form-control" type="text" name="category_name" placeholder="Add Category ">
                        </div>

                        <div class="mb-3">
                    <label for="categorystatus">Status</label>
                    <select name="categorystatus" class="form-control mt-2" id="categorystatus">
                        <option value="1">------Select Status-------</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
    
    
                        <div class="mb-3 text-center">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
    
                    </form>
    
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection