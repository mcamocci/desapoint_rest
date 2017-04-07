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
        && isset($_POST['registration_number'])&& isset($_POST['username'])){

            $database=new Database();
            $connection=$database->connection;

            $firstName=mysqli_real_escape_string($connection,$_POST['firstName']);
            $lastName=mysqli_real_escape_string($connection,$_POST['lastName']);
            $username=mysqli_real_escape_string($connection,$_POST['username']);
            $phone=mysqli_real_escape_string($connection,$_POST['phone']);
            $email=mysqli_real_escape_string($connection,$_POST['email']);
            $university=mysqli_real_escape_string($connection,$_POST['university']);
            $college=mysqli_real_escape_string($connection,$_POST['college']);
            $course=mysqli_real_escape_string($connection,$_POST['course']);
            $registration_number=mysqli_real_escape_string($connection,$_POST['registration_number']);
            $year=mysqli_real_escape_string($connection,$_POST['year']);
            $gender=mysqli_real_escape_string($connection,$_POST['gender']);
            $semester=mysqli_real_escape_string($connection,$_POST['semester']);
            $password=mysqli_real_escape_string($connection,$_POST['password']);


            header("Content-Type :application/json");
            echo $database->registerUser($firstName,$lastName,$gender,$username,$phone,
            $email,$registration_number,$university,$college,$course,$year,$semester,$password);
         }else{
           echo "some not set";
         }
    }

?>
