<?php
   $sqlstate = $pdo->query("SELECT * FROM post WHERE id=$show")->fetch(PDO::FETCH_ASSOC);
?>

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
      main{
        width: 100%;
      }
     </style>
  </head>
  <body>

  
  <nav class="py-2 bg-success border-bottom">
    <div class="container  d-flex flex-wrap">
      <ul class="nav me-auto ">
        <li class="nav-item"><a href="<?=ROOT?>home" class="nav-link text-light link-body-emphasis px-2 active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-light link-body-emphasis px-2">category</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-light link-body-emphasis px-2">blog page</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-light link-body-emphasis px-2">Contact</a></li>
        <li class="nav-item"><a href="<?=ROOT?>about" class="nav-link text-light link-body-emphasis px-2">About</a></li>
      </ul>
      <ul class="nav">
        <li class="nav-item"><a href="<?=ROOT?>admin" class="nav-link text-light link-body-emphasis px-2"><?=creatLink()?></a></li>
        
      </ul>
    </div>
  </nav>

  <main class="bg-body-secondary ">
   <div class=" bg-light mb-3">
      <img src="<?=get_img($sqlstate['image'])?>" style="width: 100%;" height="300px">
      <h3 class="text-danger text-center pb-3" style="margin:20px 70px;">
         <?=$sqlstate['title'] ?>
         <hr>
      </h3>

   </div>

      <div class="container mt-3 bg-light" style="line-height:2">
           <?=$sqlstate['content']?>

         <p><hr>
            user : <?=$sqlstate['user_id'] ?>
         </p>
      
      </div>
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
     <p>&copy; <?= date("Y") ?></p>
   </div>
</div>

</footer>


  </body>
</html>