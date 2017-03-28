<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

  if(isset($_POST['university']) && isset($_POST['college'])){
      $database=new Database();
      $university=$_POST['university'];
      $college=$_POST['college'];
      header("Content-Type :application/json");
      echo $database->getCourses($university,$college);
  }
}

?>
