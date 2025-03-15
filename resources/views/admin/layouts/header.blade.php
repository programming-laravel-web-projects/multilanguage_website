@include('admin.layouts.head')
<body class="hold-transition sidebar-mini layout-fixed">
  <div id="loading"></div>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
   
    </ul>

 
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     

      <!-- Notifications Dropdown Menu -->
      
        <!-- User Menu -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{auth()->user()->image_path}}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{auth()->user()->name}}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img  src="{{auth()->user()->image_path}}" class="img-circle elevation-2" alt="User Image">

            <p>
              {{auth()->user()->full_name}}
              <small></small>
            </p>
          </li>
          <!-- Menu Body -->
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="{{route('user.editprofile',auth()->user()->id)}}" class="btn btn-default btn-flat">Profile</a>           
            <form method="POST" action="{{ route('logout') }}" class="btn btn-default btn-flat float-right">
              @csrf
            <a href="{{route('logout')}}"  onclick="event.preventDefault();  this.closest('form').submit();" >{{ __('Log Out') }}</a>
          </form>
            <!-- Authentication -->
 
          </li>
        </ul>
      </li>
  
    </ul>
  </nav>
  <!-- /.navbar -->
