<?php

    require_once("Database.php");

    //the login process is executed//
    prepare();

    function prepare(){

        if(isset($_POST['firstName']) && isset($_POST['gender'])
        && isset($_POST['lastName']) && isset($_POST['phone']) &&
        isset($_POST['email']) && isset($_POST['university']) &&
        isset($_POST['password']) && isset($_POST['college']) && isset($_POST['course'])
        && isset($_POST['year'])&& isset($_POST['semester'])
        && isset($_POST['registration_number'])&& isset($_POST['registration_number'])){

            $firstName=$_POST['firstName'];
            $lastName=$_POST['lastName'];
            $username=$_POST['username'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $university=$_POST['university'];
            $college=$_POST['college'];
            $course=$_POST['course'];
            $registration_number=$_POST['registration_number'];
            $year=$_POST['year'];
            $gender=$_POST['gender'];
            $semester=$_POST['semester'];
            $password=$_POST['password'];

            $database=new Database();
            header("Content-Type :application/json");
            echo $database->registerUser($firstName,$lastName,$gender,$username,$phone,
            $email,$registration_number,$university,$college,$course,$year,$semester,$password);
         }
    }

?>
