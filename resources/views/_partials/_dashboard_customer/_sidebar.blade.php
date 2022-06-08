<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
{{--      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
      <span class="brand-text font-weight-light">4wheel</span>
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

     <!-- vehicles side menu bar -->
          <li class="nav-item">
            <a href="#" class="nav-link  {{ current_page('customerVehicles') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-truck-pickup"></i>
              <p>
               Vehicles
                <i class="right fas fa-angle-down"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('customerVehicles.index')}}" class="nav-link ">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>View Vehicle listing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('customerVehicles.create')}}" class="nav-link ">
                  <i class="fas fa-truck-pickup nav-icon"></i>
                  <p>Add vehicles</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('customer-bookings.index')}}" class="nav-link {{ current_page('customer-bookings') ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar"></i>
              <p>
                  Lent Bookings
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{route('my-vehicle-bookings.index')}}" class="nav-link {{ current_page('my-vehicle-bookings') ? 'active' : '' }}">
                    <i class=" nav-icon fas fa-align-justify"></i>
                    <p>
                        Loaned Bookings
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('customer-profile.index')}}" class="nav-link {{ current_page('your-profile') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>
                        Profile
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('getDocument')}}" class="nav-link {{ current_page('your-documents') ? 'active' : '' }}">
                    <i class="nav-icons fal fa-address-card"></i>
                    <p>
                        Documents
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
