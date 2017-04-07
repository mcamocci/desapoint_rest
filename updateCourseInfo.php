<?php

    require_once("Database.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(isset($_POST['user_id']) &&
        isset($_POST['username']) && isset($_POST['fullname']) &&
        isset($_POST['university']) && isset($_POST['college']) &&
        isset($_POST['course']) && isset($_POST['year'])&& isset($_POST['semester'])
        ){

            $user_id=$_POST['user_id'];
            $username=$_POST['username'];
            $fullname=$_POST['fullname'];
            $university=$_POST['university'];
            $college=$_POST['college'];
            $course=$_POST['course'];
            $year=$_POST['year'];
            $semester=$_POST['semester'];

            $database=new Database();
            header("Content-Type :application/json");
            echo $database->updateCourseInfo($user_id,$username,$fullname,
            $university,$college,$course,$year,$semester);
         }else{
           echo "some not set";
         }
    }

?>
