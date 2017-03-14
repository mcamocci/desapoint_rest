<?php

    require_once("Database.php");
    
    //the login process is executed//
    prepare();
    
    
    
    function prepare(){
    
        if(isset($_POST['username']) && isset($_POST['password'])){
        
            $username=$_POST['username'];
            $password=$_POST['password'];        
            $database=new Database();
            echo $database->logUser($username,$password);
             
         }    
    
    }
    
?>
