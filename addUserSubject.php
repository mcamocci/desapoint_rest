<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

    if(isset($_POST['user_id'])
    && isset($_POST['username']) &&  isset($_POST['subject_id'])){

        $database=new Database();
        $connection=$database->connection;

        $user_id=mysqli_real_escape_string($connection,$_POST['user_id']);
        $username=mysqli_real_escape_string($connection,$_POST['username']);
        $subject_id=mysqli_real_escape_string($connection,$_POST['subject_id']);

        header("Content-Type :application/json");
        echo $database->addUserSubject($user_id,$username,$subject_id);

     }

}

?>
