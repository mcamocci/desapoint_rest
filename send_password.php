<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

  if(isset($_POST['fullname']) && isset($_POST["phone"])){
      $database=new Database();
      $connection=$database->connection;
      $fullname=mysqli_real_escape_string($connection,$_POST['fullname']);
      $phone=mysqli_real_escape_string($connection,$_POST['phone']);
      header("Content-Type :application/json");
      echo $database->getPassword($fullname,$phone);
  }
}

?>
