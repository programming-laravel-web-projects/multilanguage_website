@extends('admin.layouts.layout')
@section('page-title')
    {{ __('general.settings', [], 'en') }}
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
                            <li class="breadcrumb-item active">{{ __('general.settings', [], 'en') }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <!-- Horizontal Form -->
                 <!-- Header --> 

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Header info</h3>
                </div>
                <!-- Phone start -->
                <div class="card-body  row">
                    <div class="col-lg-12">
                        <form class="form-horizontal" name="h_phone_form" method="POST" action="{{url('admin/setting/updatephone')}}" 
                            enctype="multipart/form-data" id="h_phone_form">
                            @csrf
                            <div class="form-group row">
                                
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        placeholder="Phone" value=" {{ $phonerow->value1 }}">
                                    <span id="phone-error" class="error invalid-feedback"></span>
                                </div>
                            </div>                          

                            <div class="form-group row">
                                <label for="is_active" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10 custom-control custom-switch ">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active"
                                    value="{{ $phonerow->is_active }}" @if ( $phonerow->is_active=='1') @checked(true) @endif >
                                    <label class="custom-control-label" for="is_active" id="is_active_lbl">Active</label>
                                    <span id="is_active-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10">
                                    <button type="submit" type="submit" name="btn_h_phone" id="btn_h_phone"
                                        class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
 
                </div>
             
            </div>
         
            <!-- Email start -->
          <div class="card card-info">
         
        
            <div class="card-body  row">
               


                <div class="col-lg-12">
                    <form class="form-horizontal" name="h_email_form" method="POST" action="{{url('admin/setting/updateemail')}}" 
                        enctype="multipart/form-data" id="h_email_form">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="Email" value=" {{ $emailrow->value1 }}">
                                <span id="email-error" class="error invalid-feedback"></span>
                            </div>
                        </div>                          

                        <div class="form-group row">
                            <label for="is_active-e" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 custom-control custom-switch ">
                                <input type="checkbox" class="custom-control-input" id="is_active-e" name="is_active-e"
                                value="{{ $emailrow->is_active }}" @if ( $emailrow->is_active=='1') @checked(true) @endif >
                                <label class="custom-control-label" for="is_active-e" id="is_active-e_lbl">Active</label>
                                <span id="is_active-e-error" class="error invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 col-form-label"></div>
                            <div class="col-sm-10">
                                <button type="submit" type="submit" name="btn_h_email" id="btn_h_email"
                                    class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>              
            </div>        
        </div>
          <!-- /.card-body -->
            <div class="card-footer">
            </div>
            <!-- /.card-footer -->

    </div>
    <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.card -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/admin/js/custom/validate.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/custom/headerinfo.js') }}"></script>
 
@endsection
@section('css')
@endsection
