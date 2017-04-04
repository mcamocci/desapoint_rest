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

            $user_id=$_POST['user_id'];
            $firstName=$_POST['FirstName'];
            $lastName=$_POST['lastName'];
            $username=$_POST['username'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $gender=$_POST['gender'];

            $database=new Database();
            header("Content-Type :application/json");
            echo $database->updateUserProfile($user_id,$fristName,$lastName,
            $username,$phone,$email,$gender);
         }
    }

?>
