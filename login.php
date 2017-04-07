<?php

    require_once("Database.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(isset($_POST['username']) && isset($_POST['password'])){

            $database=new Database();
            $connection=$database->connection;

            $username=mysqli_real_escape_string($connection,$_POST['username']);
            $password=mysqli_real_escape_string($connection,$_POST['password']);

            header("Content-Type :application/json");
            echo $database->logIn($username,$password);

         }

    }

?>
