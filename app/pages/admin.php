<?php

      
      if(!isset($_SESSION['user']))
      {
        header('location:login');
      }

    $fileName = '../app/pages/admin/'.$section. '.php';
   if(!file_exists($fileName))
   {
    require_once '../app/pages/404.php';
   }
   ?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="http://localhost/ormval/public/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin - My blogs</title>

    <link href="http://localhost/ormval/public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="http://localhost/ormval/public/assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
      
<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">ORMVAL</a>

  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
        <svg class="bi"><use xlink:href="#search"/></svg>
      </button>
    </li>
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="bi"><use xlink:href="#list"/></svg>
      </button>
    </li>
  </ul>

  <div id="navbarSearch" class="navbar-search w-100 collapse">
    <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary" style="height: 100vh;">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="http://localhost/ormval/public/admin/dashbord">
              <i class="bi bi-speedometer2"></i>
                Dashboard
              </a>
            </li>
          </ul>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="http://localhost/ormval/public/admin/user">
              <i class="bi bi-person"></i>
                User
              </a>
            </li>
          </ul>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="http://localhost/ormval/public/admin/category">
              <i class="bi bi-tags"></i>
              Category
              </a>
            </li>
          </ul>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" aria-current="page" href="http://localhost/ormval/public/admin/post">
              <i class="bi bi-card-checklist"></i>  
              posts
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>OTHER</span>
         
          </h6>
          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="http://localhost/ormval/public/home">
                <svg class="bi"></svg>
                <i class="bi bi-house"></i>
                Home
              </a>
            </li>
          </ul>
          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="http://localhost/ormval/public/logout">
                <svg class="bi"></svg>
                <i class="bi bi-box-arrow-right"></i>
                log out
              </a>
            </li>
          </ul>
          
        </div>

      </div>
    </div>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
        </div>
      </div>
          <?php

              require_once $fileName; 
          ?>
             
    </main>
  </div>
</div>
<script src="http://localhost/ormval/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        
    </script><script src="http://localhost/ormval/public/assets/js/dashboard.js"></script></body>
</html>
