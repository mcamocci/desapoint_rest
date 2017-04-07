<?php

require_once("Database.php");

//the gets books or category is called//
prepare();

function prepare(){

    if(isset($_POST['category'])){

        $database=new Database();
        $connection=$database->connection;

        $database=new Database();
        $category=mysqli_real_escape_string($connection,$_POST['category']);
        header("Content-Type :application/json");
        echo $database->getBooks($category);

     }

   }

?>
