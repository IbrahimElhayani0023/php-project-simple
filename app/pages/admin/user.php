<?php
   $rows = $pdo->query("SELECT * FROM user")->fetchAll(PDO::FETCH_ASSOC);
   ?>
<?php if ($action == 'add') {
    ?>
            <div class="container">
            <form method="post">
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
          if(!empty($name)&&!empty($email)&&!empty($pass)&&!empty($retype))
            {
              if (strlen($pass)>= 8)  
              {

                if($pass == $_POST['retype']){
                $date = date("y-m-d");
                $sqlstate = $pdo->prepare("INSERT INTO user VALUES(null,?,?,?,?,?,null)"); 
                $sqlstate->execute([$name,$email,$pass,$date,$role]);
                    echo '<div class="alert alert-success" role="alert">
                    create user succesful
                    </div>';
                } else
                {
                    echo '<div class="alert alert-danger" role="alert">
                  sorry, your password is not correct
                  </div>';
            
                }
                }
                else
                {
                  echo '<div class="alert alert-danger" role="alert">
                  password should be more than 8 characters
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
              <input type="text" name="username" class="form-control mb-2" value="<?= old_values('username') ?>"  placeholder="username">
              <label for="floatingInput">Username</label>
            </div>

            <div class="form-floating">
              <input type="email" name="email" class="form-control mb-2" value="<?= old_values('email') ?>"  placeholder="name@example.com">
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
            <button onclick=" transitionTo()" class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
          </form>
          </div>
          <script>

function transitionTo() {
  setTimeout(function() {
    window.location.href = "http://localhost/ormval/public/admin/user";
  }, 1000);
} 
</script>

    <?php }elseif ($action == 'edit') { 
      $edit = $pdo->query("SELECT * FROM user WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
      if($edit){
            ?> 
           <div class="container">
            <form method="post" enctype="multipart/form-data">
      <h1 class="h3 mb-3 text-center fw-normal">Apdate Account</h1>
      <?php
      //$pdo = new PDO('mysql:host=localhost;dbname=myblog_db','root','');
          if(!empty($_POST))
          {
          $name = $_POST['username'];
          $email = $_POST['email'];
          $pass = $_POST['password'];
          $filnam = '';
        if(isset($_FILES['image']))
        {
            $image = $_FILES['image']['name'];
            $filnam = uniqid().$image;
            move_uploaded_file($_FILES['image']['tmp_name'],$filnam);
        }
        if(!empty($name)&&!empty($email))
          {
           
            if($pass == $_POST['retype']){
              if (empty($pass)) {
                $pass = $edit['password'];
              }
              if(strlen($pass)>=8){
            $date = date("y-m-d");
            $sqlstate = $pdo->prepare("UPDATE user SET username =? ,email =? ,password =?,image=? WHERE id=?"); 
            $sqlstate->execute([$name,$email,$pass,$filnam,$id]);
              echo '<div class="alert alert-success" role="alert">
              update user succesful
              </div>';
            } 
            else
            {
                echo '<div class="alert alert-danger" role="alert">
            your password should be more than 8 characters
              </div>';
        
            }
          }else {
            echo '<div class="alert alert-danger" role="alert">
            sorry, your password is not like your retype password
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
            <input type="text" name="username" class="form-control mb-2" value="<?=old_values('username',$edit['username'] )  ?>"  placeholder="username">
            <label for="floatingInput">Username</label>
          </div>
           <div class="my-2"><label>
           <img src="<?=get_img($edit['image']);?>" width="100px" height="100px" class="imade-new"  style="cursor: pointer;" >
           <input type="file" onchange="display_img_edit(this.files[0])" name="image" class="d-none">
           </label> 
           <script>
             function display_img_edit(file) {
             document.querySelector(".imade-new").src = URL.createObjectURL(file)
             }
           </script>
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control mb-2" value="<?= old_values('email',$edit['email']) ?>"  placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control mb-2" placeholder="Password">
            <label for="floatingPassword">Password <sup>"leave it empty if you dont want to change password"</sup></label>
          </div>
      
          <div class="form-floating">
            <input type="password" name="retype" class="form-control mb-2"  placeholder="Retype Password">
            <label for="floatingPassword">Retype Password</label>
          </div>
          <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
           <div class="my-3">    
            <a href="<?=ROOT?>admin/user" class="btn btn-primary">back</a>
          </div>
        </form>
        </div>

        
        
  <?php
     }else{
      echo '<div class="alert alert-danger text-center" role="alert">
        User not found
      </div>';
    }

 }elseif($action == 'delete'){ 
  
  $del = $pdo->query("SELECT * FROM user WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
     $dd = $id;
       if(isset($_POST['submit']))
       {
        $deleteD = $pdo->prepare("DELETE FROM user WHERE id = ?");
        $deleteD->execute([$dd]);
        echo '<div class="alert alert-danger text-center" role="alert">
        User 
      </div>';
    }
   
  ?>
    <div class="container">
    <h2 class="text-center text-danger my-5">are you sure you want to delete this user</h2>
      <h4 class="mx-5 mb-4"><?=$del['username'] ?></h4>
      <h5 class="mx-5 mb-5"><?=$del['email'] ?></h5>
      
        <form method="post" class="row container ">
          <input onclick="transitionTo() " type="submit" value="delete" name="submit" class="col mx-3 text-center btn btn-danger">
          <button class="col mx-3 text-center btn btn-primary">Cancle</button>
        </form>
        <script>

                function transitionTo() {
                  setTimeout(function() {
                    window.location.href = "http://localhost/ormval/public/admin/user";
                  }, 1000);
                } 
        </script>
    </div>
    <?php }else {?>
                <h4>Users : <a href="<?=ROOT?>admin/user/add" class="btn btn-primary">Add</a></h4>
   
   <?php if(!empty($rows)) {?>
<table class="table">
    
    <tr>
        <th>#</th><th>user</th><th>email</th><th>role</th><th>image</th><th>date</th>
    </tr>
    <?php
    foreach( $rows as $row ){

        ?>
           
    <tr>
    <td><?=$row['id'];?></td>
    <td><?=$row['username'];?></td>
    <td><?=$row['email'];?></td>
    <td><?=$row['role'];?></td>
    <td>
      <img src="<?=get_img($row['image']);?>" width="100px" height="100px" >
    </td>
    <td><?=$row['date'];?></td>
    <td>
        <a href="<?=ROOT?>admin/user/edit/<?=$row['id']?>">
            <button class="btn btn-primary btn-sm "><i class="bi bi-pencil-square"></i></button> 
        </a>
        <a href="<?=ROOT?>admin/user/delete/<?=$row['id']?>">
           <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>    
        </a>
    </td>
    </tr>

    <?php
    }
   }
?>
  
</table>
                
                
<?php } ?>
