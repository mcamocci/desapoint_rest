<?php

class Database{


    var $connection;

    function __construct($host="localhost",$username="root",$password="haikarose",$database="desapoint"){
        $this->connection=new mysqli($host,$username,$password,$database);
    }


    public function logIn($username,$password){

          $querry="SELECT FirstName,username,fullname,phone,email,gender,users.User_id,image from users
          WHERE UserName='$username' and Password='$password' LIMIT 1";
          $resultset=$this->connection->query($querry);
          while($row=$resultset->fetch_assoc()){
              $user=$row;
              return json_encode($user);
          }
          return "none";
    }

    public function userSubjects($user_id){

          $querry="SELECT user_subjects.subject , user_subjects.subject_code ,
           count(subject_code)  from user_subjects JOIN notes on
           notes.subject=user_subjects.subject group by user_subjects.id;";

          $resultset=$this->connection->query($querry);
          while($row=$resultset->fetch_assoc()){
              $subjects=$row;
              return json_encode($subjects);
          }
          return "none";
    }

    public function articleBookCategory(){

          $querry="SELECT * FROM books_category;";

          $resultset=$this->connection->query($querry);
          $bookscats=array();
          while($row=$resultset->fetch_assoc()){
              $bookscats[]=$row;
          }
          if(count($bookscats)<1){
            return "none";
          }
          return json_encode($bookscats);

    }

    public function getUserNotes($id){

          $querry="SELECT  user_subjects.subject,user_subjects.subject_code
          from user_subjects where user_id='$id';";

          $resultset=$this->connection->query($querry);
          $usernotes=array();
          while($row=$resultset->fetch_assoc()){
              $usernotes[]=$row;
          }
          if(count($usernotes)<1){
            return "none";
          }
          return json_encode($usernotes);

    }

    public function getUserSubjects($id){

          $querry="SELECT  user_subjects.id,subject,user_subjects.subject_code
          from user_subjects where user_id='$id';";

          $resultset=$this->connection->query($querry);
          $usernotes=array();
          while($row=$resultset->fetch_assoc()){
              $usernotes[]=$row;
          }
          if(count($usernotes)<1){
            return "none";
          }
          return json_encode($usernotes);

    }


    public function getArticles($id){

          $querry="SELECT user_subjects.subject,user_subjects.subject_code
          from user_subjects where user_id='$id';";

          $resultset=$this->connection->query($querry);
          $usernotes=array();
          while($row=$resultset->fetch_assoc()){
              $usernotes[]=$row;
          }
          if(count($usernotes)<1){
            return "none";
          }
          return json_encode($usernotes);

    }

    public function getBooks($id){

          $querry="SELECT user_subjects.subject,user_subjects.subject_code
          from user_subjects where user_id='$id';";

          $resultset=$this->connection->query($querry);
          $usernotes=array();
          while($row=$resultset->fetch_assoc()){
              $usernotes[]=$row;
          }
          if(count($usernotes)<1){
            return "none";
          }
          return json_encode($usernotes);

    }





}






?>
