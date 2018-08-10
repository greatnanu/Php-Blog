<?php 
  include '../libs/config.php';
  include '../libs/database.php';
  include '../functions.php';
  $db = new Database();
  
  // inserting post
  if(isset($_POST['submit'])){
    
    $fname=mysqli_real_escape_string($db->link,$_POST['fname']);
    $lname=mysqli_real_escape_string($db->link,$_POST['lname']);
    $email=mysqli_real_escape_string($db->link,$_POST['email']);
    $pass=mysqli_real_escape_string($db->link,$_POST['pass']);
    $cpass=mysqli_real_escape_string($db->link,$_POST['cpass']);
    
    if($fname== ''|| $lname == ''|| $email==''||$pass==''|| $cpass==''){
      echo"<div class='alert alert-danger'> please fill all the fields</div>";
    }else{
      if ($pass == $cpass) {
         $query = "insert into admin(email,pass,fname,lname) values
      ('$email','$pass','$fname','$lname')";
      $run=$db->insert($query);
      }else{
        echo"<div class='alert alert-danger'> password mismatched</div>";
      }
    
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
    <style type="text/css">
      .from{
        width: 60%;
        padding: 15px;
        margin: 15px auto;
      } h1{
        margin-top: 20px;
      }
    </style>
  </head>


  <body>
<h1 class="text-center">Sign Up Form </h1>
  <form action="signup.php" method="post" >
  <div class="container-fluid">
    <div class="container">
      <div class="container">
        <div class="container from" >
          <div class="row">
            
            <div class="col-md-6 col-lg-6 col-xl-6 col-xs-6">
              <div class="form-group">
                
                <input type="text" name="fname" placeholder="First Name" class="form-control">
                
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 col-xs-6">
              <div class="form-group">

                <input type="text" name="lname" placeholder="Last Name Name" class="form-control">
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group ">
                <input type="email" name="email" placeholder="Enter Email " class="form-control" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group ">
                <input type="password" name="pass" placeholder="Enter Password " class="form-control" minlength="8" maxlength="16">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group ">
                <input type="password" name="cpass" placeholder="Confirm Password" class="form-control" minlength="8" maxlength="16">
              </div>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary" >Submit</button>
        </div>
      </div>
    </div>
  </div>
  </form>
</body>
</html>

        
