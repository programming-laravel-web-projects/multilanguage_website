 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{$mainarr['logo']}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{$mainarr['title']}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth()->user()->image_path}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
      
          <a href="{{route('user.editprofile',auth()->user()->id)}}" class="d-block">{{auth()->user()->full_name}}</a>
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
        
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
               
              <i class="nav-icon fa fa-users" aria-hidden="true"  ></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href= "{{ route('user.index') }}" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.create')}}" class="nav-link">
                  <i class="far fa fa-plus-square nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
             
            </ul>
          </li>
       
{{--           
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
               
              <i class="nav-icon fa fa-file" aria-hidden="true"  ></i>
              <p>
              Posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link ">
                  <i class="far fa fa-folder nav-icon" aria-hidden="true"></i>
                  <p>Category
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/cpanel/category/view') }}" class="nav-link">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/cpanel/category/add') }}" class="nav-link">
                      <i class="far fa fa-plus-square nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/cpanel/category/sort') }}" class="nav-link">
                      <i class="far fa fa-sort nav-icon"></i>
                      <p>Sorting</p>
                    </a>
                  </li>                   
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link ">
                  <i class="far fa fa-file"></i>
                  <p>Post
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/cpanel/post/view') }}"  class="nav-link">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/cpanel/post/add') }}" class="nav-link">
                      <i class="far fa fa-plus-square nav-icon"></i>
                      <p>Add</p>
                    </a>
                  </li>   
                  <li class="nav-item">
                    <a href="{{ url('/cpanel/post/sort') }}" class="nav-link">
                      <i class="far fa fa-sort nav-icon"></i>
                      <p>Sorting</p>
                    </a>
                  </li>                
                </ul>
              </li>
            </ul>
          </li> --}}

          {{-- <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
               
              <i class="nav-icon far fa-image" aria-hidden="true"  ></i>
              <p>
               Media
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/cpanel/media/view') }}" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/cpanel/media/add') }}" class="nav-link">
                  <i class="far fa fa-plus-square nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
             
            </ul>
          </li> --}}
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
               
              <i class="nav-icon far fa fa-language" aria-hidden="true"  ></i>
              <p>
             Languages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('language.index') }}" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('language.create') }}" class="nav-link">
                  <i class="far fa fa-plus-square nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">               
             
              <i class="nav-icon fas fa-edit"  aria-hidden="true"></i>
              <p>
             Design
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p> Main menu
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a  href="{{ url('/admin/design/sections','main-menu') }}" class="nav-link">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>
                                  
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p> Header Social
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/admin/design/headsocial') }}" class="nav-link">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>
                 
                  <li class="nav-item">
                    <a href="{{ url('/admin/design/getsortpage','header-social') }}" class="nav-link">
                      <i class="far fa fa-sort nav-icon"></i>
                      <p>Sorting</p>
                    </a>
                  </li>                   
                </ul>
              </li>

           

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p> Footer Social
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a  href="{{ url('/admin/design/footersocial') }}" class="nav-link">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>
                 
                  <li class="nav-item">
                    <a href="{{ url('/admin/design/getsortpage','footer-social') }}" class="nav-link">
                      <i class="far fa fa-sort nav-icon"></i>
                      <p>Sorting</p>
                    </a>
                  </li>                   
                </ul>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p> Footer Sections
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a  href="{{ url('/admin/design/sections','footer') }}" class="nav-link">
                      <i class="far fa fa-list-alt nav-icon"></i>
                      <p>View</p>
                    </a>
                  </li>
                                  
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
               
              <i class="nav-icon far fa fa-cog" aria-hidden="true"  ></i>
              <p>
             Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/setting/siteinfo') }}" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Site info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/setting/getsocial')}}" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Social</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/setting/headinfo') }}" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Header Info</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/setting/translate') }}" class="nav-link ">
                  <i class="far fa fa-list-alt nav-icon"></i>
                  <p>Translate</p>
                </a>
              </li>
               
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

