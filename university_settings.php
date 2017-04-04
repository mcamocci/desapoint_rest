<?php

    require_once("Database.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(isset($_POST['user_id']) && isset($_POST['college']) && isset($_POST['course'])
          && isset($_POST['year'])&& isset($_POST['semester'])){

            $user_id=$_POST['user_id'];
            $college=$_POST['college'];
            $course=$_POST['course'];
            $year=$_POST['year'];
            $semester=$_POST['semester'];

            $database=new Database();
            header("Content-Type :application/json");
            echo $database->collegeUpdates($user_id,$college,$course,$year,$semester);

         }else{
           header("Content-Type :application/json");
           echo "notset";
         }

    }

?>
