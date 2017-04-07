<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

    if(isset($_POST['category'])){
        $database=new Database();
        $connection=$database->connection;

        $category=mysqli_real_escape_string($connection,$_POST['category']);
        header("Content-Type :application/json");
        echo $database->getArticles($category);

     }

}

?>
