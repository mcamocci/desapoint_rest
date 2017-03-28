<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

  if(isset($_POST['fullname']) && isset($_POST["phone"])){
      $database=new Database();
      $fullname=$_POST['fullname'];
      $phone=$_POST['phone'];
      header("Content-Type :application/json");
      echo $database->getPassword($fullname,$phone);
  }
}

?>
