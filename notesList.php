<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

    if(isset($_POST['subject'])){

        $database=new Database();
        $connection=$database->connection;

        $subject=mysqli_real_escape_string($connection,$_POST['subject']);
        $database=new Database();
        header("Content-Type :application/json");
        echo $database->getUserNotes($subject);

     }

}





?>
