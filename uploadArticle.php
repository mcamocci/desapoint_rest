<?php

    require_once("Database.php");
    require_once("FileHandler.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(isset($_POST['user_name'])
          && isset($_POST['subject']) && isset($_POST['article_notes'])
          && isset($_POST['writter']) && isset($_POST['article_name'])
          && isset($_POST['user_id'])
        ){

            echo $file_path=FileHandler::uploadArticle();
         }else{
           echo "some not set";
         }
    }

?>
