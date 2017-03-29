<?php

class Database{

    var $connection;
    //$host="localhost",$username="root",$password="haikarose",$database="desapoint"
    function __construct($host="localhost",
    $username="desapoint",$password="ricrde0703037",$database="desapoin_udsis"){
        $this->connection=new mysqli($host,$username,$password,$database);
    }


    public function getPassword($fullname,$phone){

         //$fullname=mysqli_real_escape_string($fullname);
         //$phone=mysqli_real_escape_string($phone);
         $querry="INSERT  INTO forget_password(fullname,phone) VALUES('$fullname','$phone');";

         if($resultset=$this->connection->query($querry)){
             return "your request is processed ,Please dont repeat this process unless notified";
         }else{
             return "none";
         }
    }

    public function logIn($username,$password){

         //SELECT FirstName,username,fullname,phone,email,gender,users.User_id,image,
         //university, college,year,semister,program from users JOIN user_settings on
         //users.User_id=user_settings.User_id WHERE UserName='aa' and Password='aa' LIMIT 1

          $querry="SELECT FirstName,username,fullname,phone,email,gender,users.User_id,image from users
          WHERE UserName='$username' and Password='$password' LIMIT 1";
          $resultset=$this->connection->query($querry);
          while($row=$resultset->fetch_assoc()){
              $user=$row;
              return json_encode($user);
          }
          return "none";
    }

    public function getTopics($subject_name){

          $querry="SELECT id , topic as title , subject FROM subject_topic
           WHERE subject='$subject_name'";

           $topics=array();
           $resultset=$this->connection->query($querry);
           while($row=$resultset->fetch_assoc()){
               $topics[]=$row;
           }
           if(count($topics)<1){
             return "none";
           }
           return json_encode($topics);

    }

    public function getAllAnnouncements($subject_name){

          $querry="";

           $announcements=array();
           $resultset=$this->connection->query($querry);
           while($row=$resultset->fetch_assoc()){
               $announcements[]=$row;
           }
           if(count($announcements)<1){
             return "none";
           }
           return json_encode($assignments);

    }

    public function getAllAssignments($subject_name){

          $querry="SELECT fullname as poster , file as url, date_collection as date_return
           ,message as description , head as title , subject FROM assignment_subject
          WHERE assignment_subject.subject='$subject_name';";

           $assignments=array();
           $resultset=$this->connection->query($querry);
           while($row=$resultset->fetch_assoc()){
               $assignments[]=$row;
           }
           if(count($assignments)<1){
             return "none";
           }
           return json_encode($assignments);

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

    public function getColleges($university){

      $querry="SELECT id,college_name as name,university
      FROM colleges WHERE university='$university';";
      $colleges=array();
      $resultset=$this->connection->query($querry);
      while($row=$resultset->fetch_assoc()){
         $colleges[]=$row;
      }
      if(count($colleges)<1){
        return "none";
      }
      return json_encode($colleges);

    }


    public function getUserUniversity($user_id){

      $querry="SELECT university FROM user_settings
       WHERE User_id='$user_id';";
      $university=null;
      $resultset=$this->connection->query($querry);
      while($row=$resultset->fetch_assoc()){
         $university=$row['university'];
      }
      if($university==null){
        return "none";
      }
      return $university;

    }



    public function getCourses($university,$college){

      $querry="SELECT course.id, university,course_name FROM course
      WHERE course.college_id IN (SELECT id FROM colleges
      WHERE college_name='$college' and university='$university');";
      $courses=array();
      $resultset=$this->connection->query($querry);
      while($row=$resultset->fetch_assoc()){
         $courses[]=$row;
      }
      if(count($courses)<1){
        return "none";
      }
      return json_encode($courses);

    }

    public function getUniversities(){

      $querry="SELECT * FROM universities";
      $universities=array();
      $resultset=$this->connection->query($querry);
      while($row=$resultset->fetch_assoc()){
         $universities[]=$row;
      }
      if(count($universities)<1){
        return "none";
      }
      return json_encode($universities);

    }


    //the methods to be defined bellow are only
    //concerning with the user registration


    public function getAllUniversityCollege($university_name){

    }

    public function getAllCollegeCourse($college){

    }


    public function getAllCourseByYearAndSemister($course,$year,$semister){


    }

    // all methods should end here//


    //codes concerning user registraion///



    //they should end here//


   //codes concerning user profile and settins;



   //the end of profile and settings codes//


}






?>
