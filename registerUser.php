<?php

    require_once("Database.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) &&
        isset($_POST['email']) && isset($_POST['university']) &&
        isset($_POST['password']) && isset($_POST['college']) && isset($_POST['course'])
          && isset($_POST['year'])&& isset($_POST['semester'])){

            $firstName=$_POST['FirstName'];
            $lastName=$_POST['lastName'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $university=$_POST['university']
            $college=$_POST['college'];
            $course=$_POST['course'];
            $year=$_POST['year'];
            $semester=$_POST['semester'];
            $password=$_POST['password'];

            $database=new Database();
            header("Content-Type :application/json");
            echo $database->registerUser($fristName,$lastName,$username,$phone,
            $email,$university,$college,$course,$year,$semester,$password);
         }
    }

?>
