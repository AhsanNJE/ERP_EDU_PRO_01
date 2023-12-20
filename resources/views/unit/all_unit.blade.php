@extends('admin.admin_master_dashboard')
@section('admin')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
<div class="card">
  <div class="card-header">
    <h3 class="card-title">All Unit</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <!-- <div class="dt-buttons btn-group flex-wrap"> <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button> <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button> <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button> <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
            <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis" tabindex="0" aria-controls="example1" type="button" aria-haspopup="true" aria-expanded="false"><span>Column visibility</span></button></div>
          </div> -->
        </div>
      </div>
  <a href="{{ route('add.unit') }}" class="btn btn-info">Add Unit</a>
      <div class="row">
        <div class="col-sm-12">
          <table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed"role="grid" aria-describedby="example1_info">
            <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">SL:</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Unit Name</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Unit Status</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="display: none;">Action</th>
              
              </tr>
            </thead>
            <tbody>
              @foreach($inv_unit as $key => $item)
              <tr class="odd">

                <td class="dtr-control sorting_1" tabindex="0">{{ $key+1 }}</td>
                <td>{{ $item->unit_name }}</td>
                <td>
              @if($item->status==1)
              <a href="{{ route('unit.status',$item->id) }}" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i>Active</a>
              @else
                  <a href="{{ route('unit.status',$item->id) }}" class="btn btn-danger btn-sm">Inactive</a>
              @endif
                </td>
                <td style="display: none;">

                <a href="{{ route('edit.unit',$item->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Edit</a>

                <a href="{{ route('delete.unit',$item->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i>Delete</a>
                
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th rowspan="1" colspan="1">SL:</th>
                <th rowspan="1" colspan="1">Unit Name</th>
                <th rowspan="1" colspan="1">Unit Status</th>
                <th rowspan="1" colspan="1" style="display: none;">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
@endsection