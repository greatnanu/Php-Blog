<?php
include '../libs/config.php';
include '../libs/database.php';
include '../functions.php';
$db = new Database();
if(isset($_GET['delete_id'])){
    $did= $_GET['delete_id'];
    $query = "delete from post where id = '$did'";
    $run = $db->delete($query);
  }
  ?>