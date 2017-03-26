<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

  $database=new Database();
  header("Content-Type :application/json");
  echo $database->getUniversities();

}

?>
