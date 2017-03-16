<?php

require_once("Database.php");

//the gets books or category is called//
prepare();

function prepare(){

    if(isset($_POST['subject'])){

        $database=new Database();
        $subject=$_POST['subject'];
        header("Content-Type :application/json");
        echo $database->getPastPapers($subject);

     }

   }

?>
