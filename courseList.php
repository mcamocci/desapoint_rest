<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

  if(isset($_POST['university']) && isset($_POST['college'])){

      $database=new Database();
      $connection=$database->connection;

      $university=mysqli_real_escape_string($connection,$_POST['university']);
      $college=mysqli_real_escape_string($connection,$_POST['college']);
      header("Content-Type :application/json");
      echo $database->getCourses($university,$college);
  }
}

?>
