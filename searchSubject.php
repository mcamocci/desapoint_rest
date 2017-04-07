<?php

require_once("Database.php");

//the login process is executed//
prepare();

function prepare(){

    $database=new Database();
    $connection=$database->connection;

    if(isset($_POST['keyword'])){
        $keyword=mysqli_real_escape_string($connection,$_POST['keyword']);
        header("Content-Type :application/json");
        echo $database->searchSubject($keyword);
     }

}





?>
