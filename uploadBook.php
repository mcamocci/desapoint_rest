<?php

    require_once("Database.php");
    require_once("FileHandler.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(
          isset($_FILES['uploaded_book'])
          && isset($_POST['name'])
          && isset($_POST['description'])
          && isset($_POST['user_name'])
          && isset($_POST['category'])
          && isset($_POST['university'])
         ){

            header("Content-Type :application/json");
            echo $file_path=FileHandler::uploadBook();

         }else{
           echo "some not set";
         }
    }

?>
