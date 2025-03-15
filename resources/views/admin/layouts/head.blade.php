<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
   
  <title> @yield('page-title') | {{$mainarr['title']}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Favicon -->
<link rel="icon" href="{{$mainarr['favicon']}}" type="image/x-icon"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
 
 
  <!-- Ionicons -->
{{--   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
  <!-- Tempusdominus Bbootstrap 4 -->
{{--   <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"> --}}
  <!-- JQVMap -->
  {{-- <link  href="{{URL::asset('assets/admin/plugins/jqvmap/jqvmap.min.css')}}"> --}}
 
  @yield('css')
      <!-- SweetAlert2 -->
      <link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
      <!-- Toastr -->
      <link rel="stylesheet" href="{{ URL::asset('assets/admin/plugins/toastr/toastr.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('assets/admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
{{--   <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/daterangepicker/daterangepicker.css')}}"> --}}
  <!-- summernote -->
  <link rel="stylesheet" href="{{URL::asset('assets/admin/plugins/summernote/summernote-bs4.css')}}">

      <!-- Custom Css -->
      <link href="{{URL::asset('assets/admin/css/style.css')}}" rel="stylesheet">
      <link href="{{URL::asset('assets/admin/css/custom/main.css')}}" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
 