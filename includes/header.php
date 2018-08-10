<?php 
session_start();
  include 'libs/config.php';
  include 'libs/database.php';
  include 'functions.php';
  $db = new Database();
  $query = "select * from post order by id desc";
  $post = $db->select($query);
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

    <title>Simple PHP Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/blog.css" rel="stylesheet">
    <link href="bootstrap/css/button.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/script/ie-emulation-modes-warning.js"></script>

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
          <a class="blog-nav-item active" href="index.php">Home</a>
          <a class="blog-nav-item" href="posts.php">All Posts</a>
          <a class="blog-nav-item" href="services.php">Services</a>
          <a class="blog-nav-item" href="about.php">About Us</a>
          <a class="blog-nav-item" href="contact.php">Contact Us</a>
          <?php if(isset($_SESSION['email'])):?>
          <a class="blog-nav-item pull-right" href="admin/index.php">Go to Admin Panel</a>
          <?php endif;?>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">Simple Blog To Talk</h1>
        <p class="lead blog-description">This is a simple blog .Designed by Shubham . </p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
        <?php
        while($row=$post->fetch_array()):
        ?>

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']);?> by <a href="#"><?php echo $row['author'];?></a></p>

            <p><?php echo substr($row['content'],0,10);?></p>
            <a href="single.php?id=<?php echo $row['id'];?>" class="readmore">Read More</a>
            
          </div><!-- /.blog-post -->
        <?php endwhile;?>