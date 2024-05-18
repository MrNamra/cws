<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="{{route('logout')}}">
            LogOut
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://as2.ftcdn.net/v2/jpg/00/65/77/27/1000_F_65772719_A1UV5kLi5nCEWI0BNLLiFaBPEkUbv5Fv.jpg" class="img-circle elevation-2" alt="User Image">
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
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link @if(Route::is('dashboard')) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('addui')}}" class="nav-link @if(Route::is('addui')) active @endif">
              <i class="nav-icon fas fa-th"></i>
              <p>
                AddNew
              /Update</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('postnews')}}" class="nav-link @if(Route::is('postnews')) active @endif">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Post News
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link @if(Route::is('report')|| Route::is('showsubassignment')) active @endif">
              @if($report = DB::table('feedbacks')->where('type', '0')->count())
                <span class="badge badge-danger left">.</span>
              @endif
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Tickets
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('report')}}" class="nav-link @if(Route::is('report')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Report</p>
                  @if($report > 0)
                    <span class="badge badge-info right">{{$report}}</span>
                    @endif
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('showsubassignment')}}" class="nav-link @if(Route::is('showsubassignment')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assignment Submited</p>
                <span class="badge badge-info right">3</span>
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