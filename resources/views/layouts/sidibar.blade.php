<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link">
    <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Absensi App</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('absensi.index') }}" class="nav-link">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>Absensi</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('riwayat.index') }}" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>Riwayat Absensi</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('laporan.index') }}" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>Laporan Bulanan</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('profil.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>Update Profil</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
