<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="<?=ROOT?>assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Home - <?=APP_NAME?></title>
<link href="<?=ROOT?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ROOT?>assets/css/bootstrap-icons.css">
    <link href="<?=ROOT?>assets/css/headers.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=ROOT?>assets/slider/ism/css/my-slider.css"/>
     <script src="<?=ROOT?>assets/slider/ism/js/ism-2.2.min.js"></script>
     <style>
        textarea{
          height: 100;
        }
     </style>
  </head>
  <body class="bg-body-secondary">
  <nav class="py-2 bg-success border-bottom">
    <div class="container  d-flex flex-wrap">
      <ul class="nav me-auto ">
        <li class="nav-item"><a href="<?=ROOT?>home" class="nav-link text-light link-body-emphasis px-2 active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="<?=ROOT?>category" class="nav-link text-light link-body-emphasis px-2">category</a></li>
        <li class="nav-item"><a href="<?=ROOT?>contact" class="nav-link text-light link-body-emphasis px-2">Contact</a></li>
        <li class="nav-item"><a href="<?=ROOT?>about" class="nav-link text-light link-body-emphasis px-2">About</a></li>
      </ul>
      <ul class="nav">
        <li class="nav-item"><a href="<?=ROOT?>admin" class="nav-link text-light link-body-emphasis px-2"><?=creatLink()?></a></li>
        
      </ul>
    </div>
  </nav>
  <main class="mb-4">

      <form method="post" class="container">
          
          
          <h1 class="h3 mb-3 text-center fw-normal">contact with us</h1>
          <div class="form-floating">
              <input type="email" name="email" class="form-control mb-2" value=""  placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
                
                <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="message"></textarea>
                </label>
            
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>
        <footer class="py-5 " style="background-color: #231;">
            
        <div class="container ">
            
    <div class="row">
        <div class="col-6 col-md-2 mb-3">
            <h5 class="text-light">Section</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">categoru</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">blog</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Contact</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
        </ul>
    </div>
    
    <div class="col-6 col-md-2 mb-3">
        <h5 class="text-light">Section</h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">link</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">link</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">link</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
        </ul>
    </div>
    
    <div class="col-6 col-md-2 mb-3">
        <h5 class="text-light">Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">link</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">link</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">link</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">About</a></li>
        </ul>
      </div>

      <div class="col-md-5 offset-md-1 mb-3">
        <form>
          <h5 class="text-light">Subscribe to our newsletter</h5>
          <p class="text-light">Monthly digest of what's new and exciting from us.</p>
          <div class="d-flex flex-column flex-sm-row w-100 gap-2">
            <label for="newsletter1" class="visually-hidden">Email address</label>
            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
            <button class="btn btn-success" type="button">Subscribe</button>
          </div>
        </form>
      </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-center py-4 my-4 border-top">

    <p class="mt-5 mb-3 text-center text-light">&copy; <?= date("Y");?></p>
    </div>
 </div>

</footer>
