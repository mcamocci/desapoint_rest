<?php

    require_once("Database.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(
          isset($_FILE['file']) && isset($_POST['name'])
          && isset($_POST['description']) && isset($_POST['subject']
          && isset($_POST['writter']) && isset($_POST['category']))
        ){

            $file=$_FILE['file'];
            $subject=$_POST['subject'];
            $name=$_POST['name'];
            $category=$_POST['category'];
            $description=$_POST['description'];

            $file_path=FileHandler::uploadBook();


            $database=new Database();
            header("Content-Type :application/json");
            echo $database->updateUserProfile($user_id,$fristName,$lastName,
            $username,$phone,$email,$gender);
         }
    }

?>
