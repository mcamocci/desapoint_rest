<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

    if(isset($_POST['category'])){

        $category=$_POST['category'];
        $database=new Database();
        header("Content-Type :application/json");
        echo $database->getArticles($category);

     }

}





?>
