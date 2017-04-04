<?php

    require_once("Database.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(
          isset($_FILE['file']) && isset($_POST['name'])
          && isset($_POST['description']) && isset($_POST['subject']))
        ){

            $file=$_FILE['file'];
            $subject=$_POST['subject'];
            $name=$_POST['name'];
            $description=$_POST['description'];


            $file_path=FileHandler::uploadNotes();


            $database=new Database();
            header("Content-Type :application/json");
            echo $database->updateUserProfile($user_id,$fristName,$lastName,
            $username,$phone,$email,$gender);
         }
    }

?>
