<?php

    require_once("Database.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(
          isset($_POST['firstName']) && isset($_POST['lastName'])
          && isset($_POST['phone']) && isset($_POST['email']) &&
          isset($_POST['gender']) && isset($_POST['password']) &&
          isset($_POST['user_id'])
        ){

            $database=new Database();
            $connection=$database->connection;

            $user_id=mysqli_real_escape_string($connection,$_POST['user_id']);
            $firstName=mysqli_real_escape_string($connection,$_POST['FirstName']);
            $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
            $username=mysqli_real_escape_string($connection,$_POST['username']);
            $phone=mysqli_real_escape_string($connection,$_POST['phone']);
            $email=mysqli_real_escape_string($connection,$_POST['email']);
            $gender=mysqli_real_escape_string($connection,$_POST['gender']);

            header("Content-Type :application/json");
            echo $database->updateUserProfile($user_id,$fristName,$lastName,
            $username,$phone,$email,$gender);
         }
    }

?>
