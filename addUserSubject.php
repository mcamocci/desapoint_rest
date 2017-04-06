<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

    if(isset($_POST['user_id'])
    && isset($_POST['username']) &&  isset($_POST['subject_id'])){

        $user_id=$_POST['user_id'];
        $username=$_POST['username'];
        $subject_id=$_POST['subject_id'];

        $database=new Database();
        header("Content-Type :application/json");
        echo $database->addUserSubject($user_id,$username,$subject_id);

     }

}

?>
