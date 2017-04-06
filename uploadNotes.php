<?php

    require_once("Database.php");
    require_once("FileHandler.php");



    //the login process is executed//
    prepare();


    function prepare(){

          $database=new Database();
          $connection=$database->connection;

        if(isset($_POST['user_id']) &&
          isset($_FILES['notes_upload']) && isset($_POST['name'])
          && isset($_POST['description']) && isset($_POST['subject'])&&
          isset($_POST['username'])
        ){

            $user_id=mysqli_real_escape_string($connection,$_POST['user_id']);
            $file=$_FILES['notes_upload'];
            $subject=mysqli_real_escape_string($connection,$_POST['subject']);
            $name=mysqli_real_escape_string($connection,$_POST['name']);
            $username=mysqli_real_escape_string($connection,$_POST['username']);
            $description=mysqli_real_escape_string($connection,$_POST['description']);


            echo $message=FileHandler::uploadNotes($user_id,$username,$file,$description,$subject,$name);;
            header("Content-Type :application/json");

         }else{
            echo "not set";
         }
    }

?>
