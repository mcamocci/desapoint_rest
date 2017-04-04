<?php

require_once("Database.php");

//the gets books or category is called//
prepare();

function prepare(){

    if(isset($_POST['user_id']) && isset($_POST['subject_id']) ){

        $database=new Database();
        $user_id=$_POST['user_id'];
        $subject_id=$_POST['subject_id'];
        header("Content-Type :application/json");
        echo $database->removeUserSubject($user_id,$subject_id);

     }

   }

?>
