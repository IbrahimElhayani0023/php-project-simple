
<?php
       $categorys = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);
    ?>
<?php if($action == 'add') {?>
    <link rel="stylesheet" href="<?=ROOT?>assets/summernote/summernote-lite.min.css">
    <?php  
    
    if(isset($_POST['submit']))
    {  
        $id_cat = $_POST['category'];
        $id_user = $_SESSION['user']['username'];
        $title = $_POST['title'];
        $blog = $_POST['blog'];
        $filnam = '';
        if(isset($_FILES['image']))
        {
            $image = $_FILES['image']['name'];
            $filnam = uniqid().$image;
            move_uploaded_file($_FILES['image']['tmp_name'],$filnam);
        }
        if(!empty($title)&&!empty($blog))
        {
         
            $date = date("y-m-d");
        
          $sqlstate = $pdo->prepare("INSERT INTO post VALUES(null,?,?,?,?,?,?)");
          $sqlstate->execute([ $id_user,$id_cat,$title,$blog,$filnam,$date]);
          
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            sorry , your information is nt complited
          </div>';
        }
    }

?>
<div class="container">
    <form method="post" enctype="multipart/form-data" >
        <h3>creat post</h3>
    <div class="mb-3">
        <label class="form-label">title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <?php
       $categorys = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <select name="category" class="form-control" >
       <?php
       foreach ($categorys as $category) {
        ?>
           <option value="<?=$category['id']?>"><?=$category['category']?></option>
        <?php
       }
       ?>
    </select>
    <div class="my-2"><label>
           <img src="<?=get_img($edit['image'])?>" width="200px" height="200px" class="imade-new"  style="cursor: pointer;" >
           <input type="file" onchange="display_img_edit(this.files[0])" name="image" class="d-none">
           </label> 
           <script>
             function display_img_edit(file) {
             document.querySelector(".imade-new").src = URL.createObjectURL(file)
             }
           </script>
          </div>
    <div class="mb-3">
        <label class="form-label">post</label>
                <textarea name="blog" id="summernote" class="form-control" cols="50" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary my-2" name="submit" >Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<script src="<?=ROOT?>assets/summernote/summernote-lite.min.js"></script>
<script>
  $('#summernote').summernote({
    placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    height: 250
  });
</script>
 <?php }elseif ($action == 'edit') {?>
    <link rel="stylesheet" href="<?=ROOT?>assets/summernote/summernote-lite.min.css">
    <?php  
     $edit = $pdo->query("SELECT * FROM post WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
     if($edit){
           
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $blog = $_POST['blog'];
        $category = $_POST['category_id'];
        $filnam = '';
        if(isset($_FILES['image']))
        {
            $image = $_FILES['image']['name'];
            $filnam = uniqid().$image;
            move_uploaded_file($_FILES['image']['tmp_name'],$filnam);
        }
        if(!empty($title)&&!empty($blog))
        {
         
            $date = date("y-m-d");
            $slug = 'slug';
          $sqlstate = $pdo->prepare("UPDATE post SET category_id =?,title=?, content=?,image=? WHERE id=?");
          $sqlstate->execute([$category,$title,$blog,$filnam,$id]);
          
        }
        else
        {
            echo '<div class="alert alert-danger" role="alert">
            sorry , your information is nt complited
          </div>';
        }
    }
     }
?>
<div class="container">
    <form method="post" enctype="multipart/form-data" >
        <h3>edit post</h3>
    <div class="mb-3">
        <label class="form-label">title</label>
        <input type="text" class="form-control" name="title" value="<?=old_values('title',$edit['title'])  ?>">
    </div>
 
    <select name="category_id" class="form-control" >
       <?php
       foreach ($categorys as $category) {
        ?>
           <option value="<?=$category['id']?>"><?=$category['category']?></option>
        <?php
       }
       ?>
    </select>
    <div class="my-2"><label>
           <img src="<?=get_img($edit['image']);?>" width="200px" height="200px" class="imade-new "  style="cursor: pointer;" >
           <input type="file" onchange="display_img_edit(this.files[0])" name="image" class="d-none">
           </label> 
           <script>
             function display_img_edit(file) {
             document.querySelector(".imade-new").src = URL.createObjectURL(file)
             }
           </script>
          </div>
    <div class="mb-3">
        <label class="form-label">post</label>
                <textarea name="blog" id="summernote" class="form-control" cols="50" rows="10"><?=old_values('content',$edit['content'] )  ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary my-2" name="submit" >Submit</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <script src="<?=ROOT?>assets/summernote/summernote-lite.min.js"></script>
    <script>
      $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 250
      });
    </script>
    
 <?php }elseif ($action == 'delete') {
     $del = $pdo->query("SELECT * FROM post WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
     $dd = $id;
       if(isset($_POST['submit']))
       {
        $deleteD = $pdo->prepare("DELETE FROM post WHERE id = ?");
        $deleteD->execute([$dd]);
        echo '<div class="alert alert-danger text-center" role="alert">
        User 
      </div>';
    }
    ?>
 <h2 class="text-center text-danger my-5">are you sure you want to delete this post</h2>
      <h4 class="mx-5 mb-4"><?=$del['title'] ?></h4>
      <form method="post" class="row container ">
          <input type="submit" value="delete" name="submit" class="col mx-3 text-center btn btn-danger">
          <button class="col mx-3 text-center btn btn-primary">Cancle</button>
        </form>
 <?php }else {?>
    <?php
   $rows = $pdo->query("SELECT post.* , category.category as 'category_post' FROM post INNER JOIN category on post.category_id = category.id")->fetchAll(PDO::FETCH_ASSOC);
  
   ?>

    <h4>Users : <a href="<?=ROOT?>admin/post/add" class="btn btn-primary">Add</a></h4>
   
   <?php if(!empty($rows)) {?>
<table class="table">
    
    <tr>
        <th>#</th><th>title</th><th>user author</th><th>category</th><th><th>image</th><th>date</th>
    </tr>
    <?php
    foreach( $rows as $row ){

        ?>
           
    <tr>
    <td><?=$row['id']?></td>
    <td><?=$row['title']?></td>
    <td><?=$row['user_id']?></td>
    <td><?=$row['category_post']?></td>
    <td>
      <img src="<?=get_img($row['image']);?>" width="100px" height="100px" >
    </td>
    <td><?=$row['date'];?></td>
    <td>
        <a href="<?=ROOT?>admin/post/edit/<?=$row['id']?>">
            <button class="btn btn-primary btn-sm "><i class="bi bi-pencil-square"></i></button> 
        </a>
        <a href="<?=ROOT?>admin/post/delete/<?=$row['id']?>">
           <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>    
        </a>
    </td>
    </tr>

    <?php
    }
   }
?>
  
</table>

<?php }?>