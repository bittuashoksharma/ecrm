<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ECRM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
        <header-component></header-component>
      
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <router-link to="/dashboard" class="brand-link">
          <!-- <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
          <img src="{{asset('/images/new_logo.png')}}" alt="AdminLTE Logo" class=" brand-image img-circle elevation-3 " style="opacity: .8">
          <span class="brand-text font-weight-light">ECRM</span>
        </router-link>
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <!-- <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
              <img src="{{asset('/images/profile_img.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Admin</a>
            </div>
          </div>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <router-component></router-component>
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
              </form>
            </li>
          </ul> 
          </nav>
        </div>
      </aside>
      <div class="content-wrapper">
        <router-view></router-view>
      </div>
      <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
          <h5>Title</h5>
          <p>Sidebar content</p>
        </div>
      </aside>
      <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">  </div>
        <strong>Copyright &copy; 2022 <a href="#">ECRM</a>. </strong> All rights reserved.
      </footer>
    </div>
    
  </body>
</html>