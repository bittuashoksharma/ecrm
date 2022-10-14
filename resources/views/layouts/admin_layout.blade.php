<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ECRM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    
    <script src="{{ url('/') }}/ckeditor/ckeditor.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
        <header-component></header-component>
      
      <aside class="main-sidebar sidebar-dark-primary shadow-sm ">
        <router-link to="/dashboard" class="brand-link bg-white py-2">
          <img src="{{asset('/images/new_logo.png')}}" alt="ECRM Logo" class=" img-fluid " width="104" style="opacity: .8;min-width:104px">
          
        </router-link>
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
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