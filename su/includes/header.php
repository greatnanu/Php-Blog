<?php 
  include '../libs/config.php';
  include '../libs/database.php';
  include '../functions.php';
  $db = new Database();
  $query = "select * from admin ";
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

    <title>Super User</title>

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
          <a class="blog-nav-item pull-right" href="../index.php">View Blog</a>
          <a class="blog-nav-item pull-right" href="logout.php">Log Out</a>
        </nav>
      </div>
    </div>

    <div class="container">

     

      <div class="row">

        <div class="col-sm-12 blog-main">
        <?php
          if(isset($_GET['message'])){
            echo"<div class='alert alert-success'> ".$_GET['message']."</div>";
          }
        ?>
        <table class="table table-striped">
        <tr align="center">
        <td colspan="4"><h1>Manage Users</h1></td>
        </tr>
        <tr>
          <th>User ID</th>
          <th>User Name</th>
          <th>User Email</th>
          <th>Date of Join</th>
        </tr>
        <?php
          while($row=$post->fetch_array()):
        ?>
        <tr>
        <td><?php echo$row['id'];?></td>
        <td><a href="edit_user.php?id=<?php echo $row['id'];?>"><?php echo$row['fname']." ".$row['lname'];?></a></td>
        <td><?php echo$row['email'];?></td>
        <td><?php echo formatDate($row['date']);?></td>
        </tr>
          <?php endwhile;?>

        </table><br/><br/>
        

        
        