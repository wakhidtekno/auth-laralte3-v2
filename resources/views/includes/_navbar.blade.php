  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-sm-inline-block">
        {{-- <span class="nav-link">CV Wakhid Tekno</span> --}}
        <span class="nav-link">{{ App\Instansi::first()->nama }}</span>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <span class="d-none d-md-inline mr-2">Hai, {{ Auth::user()->username }}</span>
          @if (Auth::user()->foto == url('storage'))
          <img src="{{asset('assets/dist/img/user.svg') }}" class="user-image img-circle elevation-2" alt="User Image">
          @else
          <img src="{{url(Auth::user()->foto)}}" class="user-image img-circle elevation-2" alt="User Image">
          @endif
        </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="{{route('profile')}}" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{route('edit-password')}}" class="dropdown-item">
              <i class="fas fa-lock mr-2"></i> Ubah Password
            </a>
          </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
