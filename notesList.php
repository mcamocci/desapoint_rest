<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

    if(isset($_POST['user_id'])){

        $user_id=$_POST['user_id'];
        $database=new Database();
        header("Content-Type :application/json");
        echo $database->getUserNotes($user_id);

     }

}





?>
