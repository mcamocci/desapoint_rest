<?php

    require_once("Database.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(isset($_POST['user_id']) &&
          isset($_FILE['file']) && isset($_POST['name'])
          && isset($_POST['description']) && isset($_POST['subject']))
        ){

            $user_id=$_POST['user_id'];
            $file=$_FILE['file'];
            $subject=$_POST['subject'];
            $name=$_POST['name'];
            $description=$_POST['description'];

            $university="none";
            $querry="SELECT * FROM user_settings WHERE user_id = '$user_id'";
            $database=new Database();
            $resultset=$database->querry($querry);
            $row=$resultset->fetch_array();
            echo $row['university'];


            $message=FileHandler::uploadNotes($user_id,$file,$subject,$name,$description);

            header("Content-Type :application/json");
            echo $message;

         }
    }

?>
