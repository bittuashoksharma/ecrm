<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
        <header-component></header-component>
      
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
          <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Alexander Pierce</a>
            </div>
          </div>
          <nav class="mt-2">
            <router-component></router-component>
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
        <div class="float-right d-none d-sm-inline"> Anything you want </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>. </strong> All rights reserved.
      </footer>
    </div>
    
  </body>
</html>