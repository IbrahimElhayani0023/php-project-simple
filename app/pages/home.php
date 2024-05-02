<?php
   $rows = $pdo->query("SELECT post.* , category.category as 'category_post' FROM post INNER JOIN category on post.category_id = category.id")->fetchAll(PDO::FETCH_ASSOC);

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
  </head>
  <body>

  
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
  <header class="py-3 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
      <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
       
     <span class="fs-4 text-secondary" style="font-weight: 800;">
        <img src="<?=ROOT?>assets/images/image9.png" class="rounded" width="80" height="68">
        ORMVAL
    </span>
      </a>
    
    </div>
  </header>
</main>

<div class="ism-slider" data-transition_type="fade" data-play_type="loop" data-interval="3000" data-radios="false" id="my-slider">
  <ol>
    <li>
      <img src="<?=ROOT?>assets/slider/ism/image/slides/barley-373360_1280.jpg">
      <div class="ism-caption ism-caption-0">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</div>
    </li>
    <li>
      <img src="<?=ROOT?>assets/slider/ism/image/slides/beautiful-701678_1280.jpg">
      <div class="ism-caption ism-caption-0">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</div>
    </li>
    <li>
      <img src="<?=ROOT?>assets/slider/ism/image/slides/summer-192179_1280.jpg">
      <div class="ism-caption ism-caption-0">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</div>
    </li>
    <li>
      <img src="<?=ROOT?>assets/slider/ism/image/slides/background-2276_1280.jpg">
      <div class="ism-caption ism-caption-0">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</div>
    </li>
  </ol>
  
  </div>
<div class="container">
<p class="ism-badge" id="my-slider-ism-badge"><a class="ism-link" href="http://imageslidermaker.com" rel="nofollow">generated with ISM</a></p>
<h1>Features</h1>
<div class="row mb-2">
<?php
    foreach( $rows as $row ){

        ?>
           
    <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success-emphasis"><?=$row['category_post']?></strong>
                            <h3 class="mb-0"><?=$row['title']?></h3>
                            <div class="mb-1 text-body-secondary"><?=$row['date'];?></div>
                            <p class="mb-auto"><i class="bi bi-person"></i><?=$row['user_id']?></p>
                            <a href="<?=ROOT?>show/<?=$row['id']?>" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                            </a>
                    </div>
                          <div class="col-auto d-none d-lg-block">
                          <img class="bd-placeholder-img" width="200" height="250" src="<?=get_img($row['image']);?>" alt="">
                        </div>
          </div>
    </div>
  
<?php }?>
</div>
</div>
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

<script src="<?=ROOT?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
