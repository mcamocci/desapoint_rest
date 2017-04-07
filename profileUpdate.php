<?php

    require_once("Database.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(
          isset($_POST['firstName']) && isset($_POST['lastName'])
          && isset($_POST['phone']) && isset($_POST['email']) &&
          isset($_POST['gender']) &&
          isset($_POST['user_id'])
        ){
            $database=new Database();
            $connection=$database->connection;
            header("Content-Type :application/json");
            echo $database->updateUserProfile();
         }else{
            echo "some not set";
         }
    }

?>
