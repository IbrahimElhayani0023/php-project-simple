<?php
   $rows = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);
   ?>
<?php if ($action == 'add') {
    ?>
            <div class="container">
            <form method="post">
        <h1 class="h3 mb-3 text-center fw-normal">Create Category</h1>
        <?php
        //$pdo = new PDO('mysql:host=localhost;dbname=myblog_db','root','');
          if(!empty($_POST))
          {
            $category = $_POST['category'];
            $disabled = $_POST['desabled'];
            
          if(!empty($category))
            {
                $sqlstate = $pdo->prepare("INSERT INTO category VALUES(null,?,?)"); 
                $sqlstate->execute([$category,$disabled]);
                    echo '<div class="alert alert-success" role="alert">
                    create category succesful
                    </div>';
            }
          else
            {   
              echo '<div class="alert alert-danger" role="alert">
                You need to write a Category
              </div>';
            }
        }
        ?>
            <div class="form-floating">
              <input type="text" name="category" class="form-control mb-2" value="<?= old_values('category') ?>"  placeholder="category">
              <label for="floatingInput">Category</label>
            </div>

            <div class="form-floating">
              <select name="desabled" class="form-control mb-2" >
                <option value="0">yes</option>
                <option value="1">no</option>
              </select>
              <label for="floatingInput">
                active
              </label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
          </form>
          </div>

    <?php }elseif ($action == 'edit') { 
      $edit = $pdo->query("SELECT * FROM category WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
      if($edit){
            ?> 
           <div class="container">
            <form method="post" enctype="multipart/form-data">
      <h1 class="h3 mb-3 text-center fw-normal">Apdate Category</h1>
      <?php
      //$pdo = new PDO('mysql:host=localhost;dbname=myblog_db','root','');
          if(!empty($_POST))
    {
            $category = $_POST['category'];
            $disabled = $_POST['desabled'];
        if(!empty($category))
        {
           
            $date = date("y-m-d");
            $sqlstate = $pdo->prepare("UPDATE category SET category =? , disabled=? WHERE id=?"); 
            $sqlstate->execute([$category,$disabled,$id]);
              echo '<div class="alert alert-success" role="alert">
              update category succesful';
          
        }
        else
          {   
              echo '<div class="alert alert-danger" role="alert">
              sorry, you dony write every information
              </div>';
          }
    }
}

      ?>
                 <div class="my-3">    
            <a href="<?=ROOT?>admin/category" class="btn btn-primary">back</a>
          </div>
          <div class="form-floating">
            <input type="text" name="category" class="form-control mb-2" value="<?=old_values('category',$edit['category'] )  ?>"  placeholder="category">
            <label for="floatingInput">category</label>
          </div>
       
          <div class="form-floating">
              <select name="desabled" class="form-control mb-2" >
                <option value="0">yes</option>
                <option value="1">no</option>
              </select>
              <label for="floatingInput">
                active
              </label>
            </div>

          <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>

        </form>
        </div>

        
        
  <?php
    
 }elseif($action == 'delete'){ 
  
  $del = $pdo->query("SELECT * FROM category WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
     $dd = $id;
       if(isset($_POST['submit']))
       {
        $deleteD = $pdo->prepare("DELETE FROM category WHERE id = ?");
        $deleteD->execute([$dd]);
        echo '<div class="alert alert-danger text-center" role="alert">
        category
      </div>';
    }
   
  ?>
    <div class="container">
    <h2 class="text-center text-danger my-5">are you sure you want to delete this category</h2>
      <h4 class="mx-5 mb-4"><?=$del['category'] ?></h4>
        <form method="post" class="row container ">
          <input type="submit" value="delete" name="submit" class="col mx-3 text-center btn btn-danger">
          <button class="col mx-3 text-center btn btn-primary">Cancle</button>
        </form>
    </div>
    <?php }else {?>
                <h4>Categorys : <a href="<?=ROOT?>admin/category/add" class="btn btn-primary">Add</a></h4>
   
   <?php if(!empty($rows)) {?>
<table class="table">
    
    <tr>
        <th>#</th><th>Category</th><th>disable</th>
    </tr>
    <?php
    foreach( $rows as $row ){

        ?>
           
    <tr>
    <td><?=$row['id'];?></td>
    <td><?=$row['category'];?></td>
    <td><?=$row['disabled'];?></td>

     <td>
        <a href="<?=ROOT?>admin/category/edit/<?=$row['id']?>">
            <button class="btn btn-primary btn-sm "><i class="bi bi-pencil-square"></i></button> 
        </a>
        <a href="<?=ROOT?>admin/category/delete/<?=$row['id']?>">
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
