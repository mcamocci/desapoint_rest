<?php

require_once("Database.php");

//the gets books or category is called//
prepare();

function prepare(){

    if(isset($_POST['category'])){

        $database=new Database();
        $category=$_POST['category'];
        header("Content-Type :application/json");
        echo $database->getBooks($category);

     }

   }

?>
