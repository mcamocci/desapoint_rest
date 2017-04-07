<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

  if(isset($_POST['university'])){
      $database=new Database();
      $connection=$database->connection;

      $university=mysqli_real_escape_string($connection,$_POST['university']);
      header("Content-Type :application/json");
      echo $database->getColleges($university);
  }
}

?>
