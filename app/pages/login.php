
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="<?=ROOT?>assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="<?=ROOT?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom styles for this template -->
    <link href="<?=ROOT?>assets/css/sign-in.css" rel="stylesheet">
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary"> 
<main class="form-signin w-100 m-auto">
  <form method="post">
<div class="container mx-5 ">
  <img class="mb-4 mx-5 " src="<?=ROOT?>assets/images/image9.png" width="72" height="68">

</div>

<h1 class="h3 mb-3 text-center fw-normal">Please sign in</h1>
        <?php
          if(!empty($_POST))
          {
            $email = $_POST['email'];
            $pass = $_POST['password'];
            if(($email)&&!empty($pass))
            { 
            
            $date = date("y-m-d");
            $sqlstate = $pdo->prepare("SELECT * FROM user WHERE email=? AND password=?"); 
            $sqlstate->execute([$email,$pass]);
            if($sqlstate->rowcount()>=1)
            {
              
                session_start();
                ob_start();
                $_SESSION['user'] = $sqlstate->fetch();  
                ob_end_clean(); 
                header('location:admin');
            }else{
              echo '<div class="alert alert-danger" role="alert">
              sorry, your email or your password is not correct
            </div>';
            }
            }
          }
          
        ?>
    <div class="form-floating">
      <input type="email" name="email" class="form-control mb-2" value="<?= old_values('email') ?>"  placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" value="<?= old_values('password') ?>" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="my-2">if you dont have an Account <a href="sinup">signup here</a></div>
    <div class="form-check text-start my-3 ">
      <input class="form-check-input mx-4" type="checkbox" name="remember" value="1">
      <label  class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-center text-body-secondary">&copy; <?= date("Y");?></p>
  </form>
</main>
<script src="<?=ROOT?>assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
