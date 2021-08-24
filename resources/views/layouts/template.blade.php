<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name')}} | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ asset('admins/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->

  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admins/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admins/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admins/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admins/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- summernote -->
  @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="">
                <span class="fas fa-user"></span> Profile
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <span class="fas fa-sign-out-alt"></span> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('admins/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admins/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('dashboard.index')}}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item {{ request()->is('admin/manage-blog') || request()->is('admin/manage-kategori') || request()->is('admin/manage-blog/*')  ? 'has-treeview menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/manage-blog') || request()->is('admin/manage-kategori') || request()->is('admin/manage-blog/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Manage Blog
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('kategori.index')}}" class="nav-link {{ request()->is('admin/manage-kategori') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('blog.create')}}" class="nav-link {{ request()->is('admin/manage-blog/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Blog</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('blog.index')}}" class="nav-link {{ request()->is('admin/berita') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Blog</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ request()->is('admin/manage-portfolio') || request()->is('admin/manage-portfolio/*')  ? 'has-treeview menu-open' : '' }}">
            <a href="#" class="nav-link {{ request()->is('admin/manage-portfolio') || request()->is('admin/manage-portfolio/*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-stream"></i>
              <p>
                Manage Portfolio
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('portfolio.create')}}" class="nav-link {{ request()->is('admin/manage-portfolio/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Porfolio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('portfolio.index')}}" class="nav-link {{ request()->is('admin/manage-portfolio') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Portfolio</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">All Member</li>
          <li class="nav-item">
            <a href="{{route('member.index')}}" class="nav-link {{ request()->is('admin/member') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Member
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('komentar.index')}}" class="nav-link {{ request()->is('admin/komentar') ? 'active' : '' }}">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Komentar
              </p>
            </a>
          </li>

          <li class="nav-header">Pesan atau kontak</li>
          <li class="nav-item">
            <a href="{{route('kontak.index')}}" class="nav-link {{ request()->is('admin/kontak') ? 'active' : '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Pesan Atau Kontak
              </p>
            </a>
          </li>

          <li class="nav-header">Manage Users</li>
          <li class="nav-item">
            <a href="" class="nav-link {{ request()->is('admin/manage-pengecer') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Manage Admin
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

   @yield('content')
 </div>
 <!-- /.content-wrapper -->
 <footer class="main-footer">
  <strong>Copyright &copy; 2021 <a href="#">{{config('app.name')}}</a>.</strong>
  All rights reserved.
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admins/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admins/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admins/dist/js/adminlte.js') }}"></script>

@yield('js')

</body>
</html>
