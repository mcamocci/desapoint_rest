<?php

require_once("Database.php");

//the gets books or category is called//
prepare();

function prepare(){

        $database=new Database();
        header("Content-Type :application/json");
        echo $database->articleBookCategory();

     }

?>
