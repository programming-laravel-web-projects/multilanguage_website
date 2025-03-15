@extends('admin.layouts.layout')
@section('page-title')
{{ __('general.users',[],'en') }}
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
              <li class="breadcrumb-item active">{{ __('general.users',[],'en') }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Show Users</h3>

          <div class="card-tools">
          <a class="btn btn-info btn-sm" href="{{ route('user.create')}}">
                              <i class="fas fa-plus">
                              </i>
                             New
                          </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
             
          </div>
        </div>
        <div class="card-body">
        <table id="example1" class="table table-bordered table-striped table-hover">
      
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                                
                  <th>Mobile</th>   
                  <th></th>                   
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->first_name }}</td>
                  <td>{{ $user->last_name }}</td>
                  <td>{{ $user->email }}</td>
                               
                
                  <td>{{ $user->mobile }}</td>    
                  <td>    <a class="btn btn-info btn-sm" href="{{route('user.edit', $user->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <form action="{{route('user.destroy', $user->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" id="del-{{$user->id}}" class="btn btn-danger btn-sm delete"  data-toggle="modal" data-target="#modal-delete"   title="Delete">   <i class="fas fa-trash">
                            </i>Delete</button>
</form>
                           </td>                
                </tr>
@endforeach
           
                </tbody>            
              </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
       
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	 

  <div class="modal fade" id="modal-delete">
    <div class="modal-dialog  modal-sm">
      <div class="modal-content">
        <div class="modal-body text-center" style="padding-bottom: 5px;	padding-top: 30px;">
          <h4 class="modal-title">{{ __('general.Are you sure',[],'en') }}</h4>
             </div>
        <div class="modal-footer justify-content-between" style="border-top: 0px solid  ">
          <button class="btn ripple btn-secondary"  id="btn-cancel-modal"  data-dismiss="modal" type="button">{{ __('general.cancel',[],'en') }}</button>
      
          <button class="btn ripple btn-danger " id="btn-modal-del" type="button">{{ __('general.delete',[],'en') }}</button>
           </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@section('js')
 <!-- DataTables -->
<script src="{{ URL::asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/admin/js/custom/delete.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "responsive": true,     
      "info": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
    
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
