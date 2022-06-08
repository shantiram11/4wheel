<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link">
{{--      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <!-- users side menu bar -->
          <li class="nav-item">
            <a href="#" class="nav-link {{ current_page('users') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
                <i class="right fas fa-angle-down"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link ">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>View user listing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('users.create')}}" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Add Users</p>
                </a>
              </li>
            </ul>
          </li>
     <!-- vehicles side menu bar -->
          <li class="nav-item">
            <a href="#" class="nav-link {{ current_page('vehicles') ? 'active' : '' }}">
              <i class="nav-icon fas fa-truck-pickup"></i>
              <p>
               Vehicles
                <i class="right fas fa-angle-down"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('vehicles.index')}}" class="nav-link ">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>View Vehicle listing</p>
                </a>
              </li>
            </ul>
          </li>
            <!-- categories side menu bar -->
            <li class="nav-item">
                <a href="#" class="nav-link {{ current_page('categories') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-truck-pickup"></i>
                    <p>
                        Categories
                        <i class="right fas fa-angle-down"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('categories.index')}}" class="nav-link ">
                            <i class="fas fa-eye nav-icon"></i>
                            <p>View Category listing</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('categories.create')}}" class="nav-link">
                            <i class="fas fa-truck-pickup nav-icon"></i>
                            <p>Add Category</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Roles side menu bar -->
            <li class="nav-item">
                <a href="#" class="nav-link {{ current_page('roles') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-solid fa-circle-check"></i>
                    <p>
                        Roles
                        <i class="right fas fa-angle-down"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('roles.index')}}" class="nav-link ">
                            <i class=" fas fa-solid fa-circle-check"></i>
                            <p>View Role listing</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('roles.create')}}" class="nav-link">
                            <i class=" fas fa-solid fa-circle-check"></i>
                            <p>Add Roles</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('profile.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Profile
                        <span class="right badge badge-danger">Profile</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('all-bookings.index')}}" class="nav-link {{ current_page('profile') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Bookings
                        <span class="right badge badge-danger">Bookings</span>
                    </p>
                </a>
            </li>
          <li class="nav-item">
            <a href="{{route('settings.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              Settings
                <span class="right badge badge-danger">Settings</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
