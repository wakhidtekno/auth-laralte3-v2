  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <i class="fa fa-archive fa-2x brand-image elevation-3" aria-hidden="true"></i>
      <span class="brand-text font-weight-light">Laravel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              @if (Auth::user()->level === 'superadmin')
              <li class="nav-item">
                <a href="{{route('instansi.index')}}" class="nav-link">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Instansi</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          @if (Auth::user()->level === 'superadmin')
          <li class="nav-item">
            <a href="{{route('activitylog.index')}}" class="nav-link">
              <i class="fas fa-history nav-icon"></i>
              <p>
                Log
              </p>
            </a>
          </li>
          @endif

          <li class="nav-item">
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link">
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
