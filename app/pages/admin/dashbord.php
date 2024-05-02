<?php
           $users = $pdo->query("SELECT * FROM user");
           $count_users = $users->rowcount();
           $posts = $pdo->query("SELECT * FROM post");
           $count_posts = $posts->rowcount();
           
           $category = $pdo->query("SELECT * FROM category");
           $count_category = $category->rowcount();
         ?>



<div class="container text-center" >
  <div class="row ">
    <div class="col-6 shadow-sm p-5 mb-5  rounded d-flex justify-content-between align-items-center" >
    <div class="fs-1"> <i class="bi bi-card-checklist"></i><span class="mx-5"> posts :</span></div>
     <div class="fs-1 fw-bold me-5"> 
      <?=$count_posts;?>  
    </div>
   </div>
   <div class="col-6 shadow-sm p-5 mb-5 rounded d-flex justify-content-between align-items-center" >
     <div class="fs-1"><i class="bi bi-tags"></i><span class="mx-3"> categorys :</span></div>
    
     <div class="fs-1 fw-bold me-5"> 
      <?=$count_category;?>  
    </div>
   </div>
   <div class="col-8 shadow p-5 mx-auto rounded d-flex justify-content-between align-items-center" >
   <div class="fs-1"> <i class="bi bi-person"></i><span class="mx-5"> users :</span></div>
        <div class="fs-1 fw-bold me-5"> 
         <?=$count_users;?>  
        </div>

  </div>
</div>