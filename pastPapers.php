<?php

require_once("Database.php");

//the gets books or category is called//
prepare();

function prepare(){

    if(isset($_POST['subject'])){

        $database=new Database();
        $connection=$database->connection;

        $subject=mysqli_real_escape_string($connection,$_POST['subject']);
        header("Content-Type :application/json");
        echo $database->getPastPapers($subject);

     }

   }

?>
