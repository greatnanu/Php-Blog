<?php 
  include '../libs/config.php';
  include '../libs/database.php';
  include '../functions.php';
  $db = new Database();
  $pid=$_GET['id'];
  $qu="select * from post where id = '$pid'";
  $post=$db->select($qu);
  $single = $post->fetch_array();
  $query1 = 'select * from categories';
  $cats = $db->select($query1);
  // inserting post
  if(isset($_POST['submit'])){
    $title=mysqli_real_escape_string($db->link,$_POST['title']);
    $content=mysqli_real_escape_string($db->link,$_POST['content']);
    $author=mysqli_real_escape_string($db->link,$_POST['author']);
    $tags=mysqli_real_escape_string($db->link,$_POST['tags']);
    $cat=mysqli_real_escape_string($db->link,$_POST['cat']);
    
    if($title== ''|| $content == ''|| $author==''||$tags==''|| $cat==''){
      echo"<div class='alert alert-danger'> please fill all the fields</div>";
    }else{
      $query = "update  post set category='$cat',title='$title',content='$content',tags='$tags',author='$author' where  id = '$pid'";
      $run=$db->update($query);
    }

  }
  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/blog.css" rel="stylesheet">
    <link href="../bootstrap/css/button.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrap/script/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="add_post.php">Add Posts</a>
          <a class="blog-nav-item" href="add_category.php">Add Category</a>
          <a class="blog-nav-item pull-right" href="localhost/phpblog">View Blog</a>
          <a class="blog-nav-item pull-right" href="logout.php">Log Out</a>
        </nav>
      </div>
    </div>

    <div class="container">

     

      <div class="row">

        <div class="col-sm-12 blog-main">
        <h2 style="margin-top:20px;">Add New Posts:</h2><hr>
        <form action="edit_post.php?id=<?php echo $pid;?>" method="post">
            <div class="form-group">
              <label >Post Title</label>
              <input type="text" class="form-control"  name="title"placeholder="Enter title" value="<?php echo $single['title'];?>">
            </div>
            <div class="form-group">
              <label >Content</label>
              <textarea class="form-control text-justify" name="content" ><?php echo $single['content'];?></textarea>
            </div>
            <div class="form-group">
              <label >Select Category</label>
              <select class="form-control" name="cat">
                <option>Select a Category</option>
                <?php while($row=$cats->fetch_array()):?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
              <?php endwhile;?>
              </select>
            </div>
            
            <div class="form-group">
              <label >Author Name</label>
              <input type="text" class="form-control" name="author" placeholder="Enter Author Name" value="<?php echo $single['author'];?>">
            </div>
            <div class="form-group">
              <label >Tags</label>
              <input type="text" class="form-control" name="tags" placeholder="Enter Tags" value="<?php echo $single['tags'];?>">
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <a href="index.php" class="btn btn-success">Cancel</a>
            <a href="delete_post.php?delete_id=<?php echo $pid;?>" class="btn btn-danger">Delete</a>
        </form>

        
        