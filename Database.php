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


    public function getPastPapers($subject){

          $querry="SELECT exam_file as file_url, topic as name , lecture as description
          FROM pastpapers where subject='$subject' order by id desc;";
          $pastpapers=array();
          $resultset=$this->connection->query($querry);
          while($row=$resultset->fetch_assoc()){
              $pastpapers[]=$row;
          }
          if(count($pastpapers)<1){
            return "none";
          }
          return json_encode($pastpapers);
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

    public function getUserNotes($subject){

          $querry="SELECT notes_name as name,description,notes_upload as file_url
           FROM notes WHERE notes.subject='$subject';";

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


    public function getArticles($category){

          $querry="SELECT article_name as name,article_notes as description,article_file as
           file_url FROM aticles WHERE aticles.subject='$category';";

          $resultset=$this->connection->query($querry);
          $articles=array();
          while($row=$resultset->fetch_assoc()){
              $articles[]=$row;
          }
          if(count($articles)<1){
            return "none";
          }
          return json_encode($articles);

    }

    public function getBooks($category){

      $querry="SELECT book_name as name,description,uploaded_book as file_url
      FROM books WHERE books.book_category='$category' order by id desc;";
      $books=array();
      $resultset=$this->connection->query($querry);
      while($row=$resultset->fetch_assoc()){
          $books[]=$row;
      }
      if(count($books)<1){
        return "none";
      }
      return json_encode($books);

    }





}






?>
