<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

    if(isset($_POST['subject'])){

        $subject=$_POST['subject'];
        $database=new Database();
        header("Content-Type :application/json");
        echo $database->getTopics($subject);

     }

}





?>
