<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

  if(isset($_POST['email'])){
      $database=new Database();
      $email=$_POST['email'];
      header("Content-Type :application/json");
      echo $database->getPassword($email);
  }
}

?>
