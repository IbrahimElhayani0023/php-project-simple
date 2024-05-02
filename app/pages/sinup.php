

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="hyyp://localhost/ormval/public/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>LOGIN</title>

<link href="http://localhost/ormval/public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://localhost/ormval/public/assets/css/sign-in.css" rel="stylesheet">
    
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
       
<main class="form-signin w-100 m-auto">

  <form method="post">
<div class="container mx-5 ">
  <img class="mb-4 mx-5 " src="http://localhost/ormval/public/assets/images/image9.png" width="72" height="68">
  
</div>

<h1 class="h3 mb-3 text-center fw-normal">Create Account</h1>
<?php
//$pdo = new PDO('mysql:host=localhost;dbname=myblog_db','root','');
   if(!empty($_POST))
   {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $retype = $_POST['retype'];

    $role = "user";
    $lemail = $pdo->prepare("SELECT * FROM user WHERE email=?"); 
    $lemail->execute([$email]);
  if(!empty($name)&&!empty($email)&&!empty($pass)&&!empty($retype))
    {
        if (strlen($pass)>= 8) {
          if($pass == $_POST['retype'])
          {
            if($lemail->rowcount()>=1)
             {
                  echo '<div class="alert alert-danger" role="alert">
                  sorry, the email is exicted
                  </div>';
             }else {
                  $date = date("y-m-d");
                  $sqlstate = $pdo->prepare("INSERT INTO user VALUES(null,?,?,?,?,?,null)"); 
                  $sqlstate->execute([$name,$email,$pass,$date,$role]);
                    echo '<div class="alert alert-success" role="alert">
                    create user succesful
                    </div>';
                }
      
          }
            else
          {
               echo '<div class="alert alert-danger" role="alert">
            sorry, your password is not correct
             </div>';
       
          }
        }else {
          echo '<div class="alert alert-danger" role="alert">
          your password must be more than 8 characters
         </div>';
        }
     

    }
  else
    {   
       echo '<div class="alert alert-danger" role="alert">
        sorry, you dony write every information
       </div>';
    }
 }
?>
    <div class="form-floating">
      <input type="text" name="username" class="form-control mb-2" value="<?= old_values('username',"") ?>"  placeholder="username">
      <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
      <input type="email" name="email" class="form-control mb-2" value="<?= old_values('email',"") ?>"  placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control mb-2"  placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating">
      <input type="password" name="retype" class="form-control mb-2"  placeholder="Retype Password">
      <label for="floatingPassword">Retype Password</label>
    </div>
    <div class="my-2">you have an Account <a href="login">login</a></div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" name="accepte" >
      <label class="form-check-label" for="flexCheckDefault">
         Accepte 
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
    <p class="mt-5 mb-3 text-center text-body-secondary">&copy; <?= date("Y");?></p>
  </form>
</main>
<script src="http://localhost/ormval/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
