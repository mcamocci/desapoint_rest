<?php

class Database{

    var $connection;
    //$host="localhost",$username="root",$password="haikarose",$database="desapoint"

  /*  function __construct($host="localhost",
    $username="desapoint",$password="ricrde0703037",$database="desapoin_udsis"){
        $this->connection=new mysqli($host,$username,$password,$database);
    }*/

    function __construct($host="localhost",$username="root",
    $password="haikarose",$database="desapoint"){
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

    ///////////////////////this function is for the user registration into the system/////////////////////
    public function registerUser($firstName,$lastName,$gender,$username,$phone,
        $email,$registration_number,$university,$college,$course,$year,$semester,$password){

      if($this->userId($username,$password)==-1){

        //insert into users//
        $full_name=$firstName." ".$lastName;
        $date=date('d/m/Y');
        $queryInsertIntoUser="INSERT INTO users (FirstName,LastName,fullname,
        registration_number,gender,phone,email,user_type,operation,date,image,
        userName,password,class,subject,seminar,task,role,role_2,role_3,role_4,
        role_5,role_6,role_7,role_8) VALUES ('$firstName','$lastName',
        '$full_name','$registration_number','$gender','$phone','$email','Guest','activated','$date'
        ,'','$username','$password','','','','','','','','','','','','');";
        $resultset=$this->connection->query($queryInsertIntoUser);

        if($this->connection->error){
           return "error were caught";
        }else{

                //continue to user_settings
                $user_id=$this->userId($username,$password);
                $thefullname=$firstName." ".$lastName;
                $settingQuerry="INSERT INTO user_settings (User_id,university,college,program,year,semister,
                full_name) VALUES('$user_id','$university','$college','$course','$year','$semester','$thefullname');";

                $settingsResultset=$this->connection->query($settingQuerry);

          if($this->connection->error){
                return "error were caught";
          }else{
                //continue with user_subjects//
                $user_id=$this->userId($username,$password);
                $fullname=$firstName." ".$lastName;

                $userSubjectsQuerry="INSERT INTO user_subjects (user_id,username,fullname,year,collage,programe,subject,subject_code,subject_id,specialization)
                SELECT '$user_id','$username','$fullname','$year','$college','$course',subjects.subject,subject_code,subjects.id,'' FROM
                subjects WHERE year='$year' AND semister='$semester' AND university='$university';";

                $userSubjectsResultset=$this->connection->query($userSubjectsQuerry);

                if($this->connection->error){
                      echo $this->connection->error;
                      return "error were caught";
                }else{
                      return "success";
                }
          }
        }

      }else{

        return "Your username is not allowed , please try to change it.";

      }

    }

    ///////////////////////////////////update the user course information///////////////////////////////////////////////////////

    public function updateCourseInfo($user_id,$username,$fullname,$university,$college,
    $course,$year,$semester){
          $querryString="UPDATE user_settings SET college='$college',program='$course',year='$year',semister='$semester'
          WHERE user_id='$user_id'";
          $updateResult=$this->connection->query($querryString);

          if($this->connection->error){
                return "please call desapoint, to report this problem";
          }else{
                //continue with user_subjects//
                $deletePresentQuerry="DELETE FROM user_subjects WHERE user_id='$user_id'";
                $deleteResult=$this->connection->query($deletePresentQuerry);

                if($this->connection->error){
                       return $this->connection->error;
                }

                //insert subject into the user_subjects Table
                $userSubjectsQuerry="INSERT INTO user_subjects (user_id,username,fullname,year,
                  collage,programe,subject,subject_code,subject_id,specialization)
                SELECT '$user_id','$username','$fullname','$year','$college','$course',subjects.subject,subject_code,subjects.id,'' FROM
                subjects WHERE year='$year' AND semister='$semester' AND university='$university';";
                $userSubjectsResultset=$this->connection->query($userSubjectsQuerry);

                if($this->connection->error){
                      return "something is wrong please user desapoint.com";
                }else{
                     return "success";
                }
          }

    }


    //this helper method//
    private function userId($username,$password){

      $userIdQuerry="SELECT * From users WHERE username='$username' AND password='$password'";
      $userIdQuerryResults=$this->connection->query($userIdQuerry);

      $user_id=-1;
      $userIdQuerryRow=$userIdQuerryResults->fetch_array();
      $userIdQuerryId=$userIdQuerryRow['User_id'];

      if($this->connection->error){
         return "error were caught";
      }else{

          if($userIdQuerryId!=null){
               $user_id=$userIdQuerryId;
               return $user_id;
          }else{
               return $user_id;
          }
      }
    }

    public function updateUserProfile($user_id,$fristName,$lastName,

         $username,$phone,$email,$gender){

         $fullname=$firstName." ".$lastName;

         $querry="UPDATE users SET Firstname='$firstName' , LastName='$lastName' ,
         phone='$phone',email='$email',Username='$username',
         gender='$gender', fullname='$fullname' WHERE users.User_id='';";

         $resultset=$this->connection->query($querry);

         if($resultset){

            return "success";

         }else{

            return "none";
         }

    }

   /////////this function is a service function for deleting user subjects//////
   public function removeUserSubject($user_id,$subject_id){

     $querry="DELETE FROM user_subjects WHERE
     subject_id='$subject_id' AND user_id='$user_id';";

     $resultset=$this->connection->query($querry);
     if($resultset){
       return "successfully operation";
     }else{
       return "none";
     }
   }

   /////////this function is a service adding subject to user subjects table////
   public function addUserSubject($user_id,$username,$subject_id){

         $fullnameQuerry="SELECT * FROM user_settings WHERE user_id='$user_id'";
         $fullnameResulset=$this->connection->query($fullnameQuerry);
         $fullnameRow=$fullnameResulset->fetch_array();

         if($this->connection->error){
           return "none";
         }

         $fullname=$fullnameRow['full_name'];
         $university=$fullnameRow['university'];
         $college=$fullnameRow["college"];
         $year=$fullnameRow["year"];
         $semester=$fullnameRow["semister"];


         $SubjectsInsertQuerry="INSERT INTO user_subjects (user_id,username,fullname,year,collage,programe,
           subject,subject_code,subject_id,specialization)
         SELECT '$user_id','$username','$fullname','$year','$college',subjects.programe,subjects.subject,subject_code,
         subjects.id,'' FROM  subjects WHERE subjects.id ='$subject_id';";

         $userSubjectsResultset=$this->connection->query($SubjectsInsertQuerry);

         if($this->connection->error){
               echo $this->connection->error;
               return "error were caught";
         }else{
               return "success";
         }

   }

   //the end of profile and settings codes//


}






?>
