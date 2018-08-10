<?php 
  include '../libs/config.php';
  include '../libs/database.php';
  include '../functions.php';
  $db = new Database();
  $cid=$_GET['id'];
  $qu="select * from categories where id = '$cid'";
  $cat=$db->select($qu);
  $single = $cat->fetch_array();
  if(isset($_POST['submit'])){
    $cat=mysqli_real_escape_string($db->link,$_POST['title']);
    
    if($cat== ''){
      echo"<div class='alert alert-danger'> please fill all the fields</div>";
    }else{
      $query = "update  categories set title='$cat' where  id = '$cid'";
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
        <h2 style="margin-top:20px;">Update Category:</h2><hr>
        <form action="edit_cat.php?id=<?php echo $cid;?>" method="post">
            <div class="form-group">
              <label >Category Name</label>
              <input type="text" class="form-control"  name="title"placeholder="Enter title" value="<?php echo $single['title'];?>">
            </div>
           
           
            
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
            <a href="index.php" class="btn btn-success">Cancel</a>
            <a href="delete_cat.php?delete_id=<?php echo $cid;?>" class="btn btn-danger">Delete</a>
        </form>

        
        