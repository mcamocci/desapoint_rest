<?php

require_once("Database.php");

class FileHandler{


public static function uploadNotes($user_id,$username,
$file,$description,$subject,$name){

            $database=new Database();
            $connection=$database->connection;

            $categoryQuerry="SELECT * FROM cr WHERE User_id='$user_id'";

            $categoryQuerryResulset=$connection->query($categoryQuerry);
            $rowReturned=$categoryQuerryResulset->num_rows;

            if($rowReturned==0){
                $category="Other Notes by (".$username.")";
            }else{
                $category="Official Notes From CR (".$username.")";
            }

            $user_name=$username;
            $subject=$subject;
            $notes_name=$name;
            $date2=date('y-m-d');
            $notes_category=$category;
            $description=$description;


            $query="SELECT * FROM user_settings WHERE User_id = '$user_id'";
            $database=new Database();
            $resultset=$database->connection->query($query);
            $row=$resultset->fetch_array();
            $university=$row['university'];


            /* GETING ACADEMIC YEAR */
            $result_get2=$database->connection->query("select * from  academic_year");
            $get_row2=$result_get2->fetch_array();
            $academic_year=$get_row2['academic_year'];


            /* GETING IDS FOR MAKING DIFFERENCE IN CONTENTS */
            $result_get=$database->connection->query("select * from notes ORDER BY `id` DESC");
            $get_row=$result_get->fetch_array();
            $last_id=$get_row['id'];
            $next_id=$last_id+1;
            $new_id='DESAPOINT_'.$next_id.'_';


            $notes_upload= addslashes(file_get_contents($_FILES['notes_upload']['tmp_name']));
            //$notes_upload= addslashes(file_get_contents($file['tmp_name']));

            $notes_upload_name= addslashes($new_id.$_FILES['notes_upload']['name']);
            $notes_upload_size= getimagesize($_FILES['notes_upload']['tmp_name']);

            if(move_uploaded_file(
              $file["tmp_name"],"../notes/" .$new_id. $_FILES["notes_upload"]["name"])){

                    $location="notes/" .$new_id. $_FILES["notes_upload"]["name"];
                    $result=$database->connection->query("select * from subjects where subject='$subject'");
                    $row=$result->fetch_array();
                    $subject_id=$row['id'];
                    $notes_number=$row['notes_number'];
                    $notes_number2=$notes_number+1;
                    $database->connection->query("insert into notes (subject,notes_name,description,notes_upload,user_name,status,university,
                    notes_category,date,notes_year) values ('$subject','$notes_name','$description','$notes_upload_name','$user_name'
                    ,'Activated','$university','$notes_category','$date2','$academic_year')");

                    $database->connection->query("update subjects set notes_number='$notes_number2' where id='$subject_id'");
                    $database->connection->query("INSERT INTO history (data,action,date,user)VALUES('$notes_name', 'Added New Notes', NOW(),'$user_name')");

                    return "file uploaded";

              }else{
                    return "none";
          }

  }

  public static function uploadArticle(){

              $database=new Database();
              $connection=$database->connection;

              $user_id=$_POST['user_id'];
              $user_name=$_POST['user_name'];
            	$subject=$_POST['subject'];
            	$writter=$_POST['writter'];
            	$article_name=$_POST['article_name'];
            	//$article_file=$_POST['article_file'];
            	$article_notes=$_POST['article_notes'];

              $resultUniversity=$connection->query("select * from user_settings where User_id='$user_id'");
              $rowUniversity=$resultUniversity->fetch_array();
              $university=$rowUniversity['university'];

    	        if(isset($_FILES['article_file']['tmp_name'])){
    					$article_file= addslashes(file_get_contents($_FILES['article_file']['tmp_name']));
    					$article_file_name= addslashes($_FILES['article_file']['name']);
    					$article_file_size= getimagesize($_FILES['article_file']['tmp_name']);

              $location="none";

              if(move_uploaded_file($_FILES["article_file"]["tmp_name"],"../articles/" . $_FILES["article_file"]["name"])){
                $location="articles/" . $_FILES["article_file"]["name"];
                $date=date('y-m-d');

              	$connection->query("insert into aticles (subject,writter,article_name,article_notes,article_file,date,user_name,status,university)
              				values('$subject','$writter','$article_name','$article_notes','$article_file_name','$date','$user_name','Activated','$university')");
                echo $connection->error;
                echo "before";

                $connection->query("INSERT INTO history (data,action,date,user)VALUES('$article_name', 'Added New Article', NOW(),'$user_name')");
                echo $connection->error;

                return "successfully uploaded";

              }else{

                return "none";

              }

    					}
              else{
    					$article_file_name='';
              $date=date('y-m-d');
              $connection->query("insert into aticles (subject,writter,article_name,article_notes,article_file,date,user_name,status,university)
                    values('$subject','$writter','$article_name','$article_notes','$article_file_name','$date','$user_name','Activated','$university')");

                    return "words uploaded";
              }
              return "none";



  }

  public static function uploadBook(){

         $database=new database();
         $connection=$database->connection;

         $university=mysqli_real_escape_string($connection,$_POST['university']);
	       $user_name=mysqli_real_escape_string($connection,$_POST['user_name']);
	       $book_category=mysqli_real_escape_string($connection,$_POST['category']);
	       $book_name=mysqli_real_escape_string($connection,$_POST['name']);
         $date2=date('y-m-d');
	       $description=mysqli_real_escape_string($connection,$_POST['description']);

          /* GETING IDS FOR MAKING DIFFERENCE IN CONTENTS */
      	  $result_get=$connection->query("select * from books ORDER BY `id` DESC");
      	  $get_row=$result_get->fetch_array();
      	  $last_id=$get_row['id'];
      	  $next_id=$last_id+1;
      	  $new_id='DESAPOINT_'.$next_id.'_';

					$uploaded_book= addslashes(file_get_contents($_FILES['uploaded_book']['tmp_name']));
					$uploaded_book_name= addslashes($new_id.$_FILES['uploaded_book']['name']);
					$uploaded_book_size= getimagesize($_FILES['uploaded_book']['tmp_name']);

					if(move_uploaded_file($_FILES["uploaded_book"]["tmp_name"],"../books/" .$new_id.$_FILES["uploaded_book"]["name"])){

            $location="books/" .$new_id.$_FILES["uploaded_book"]["name"];

          	$result=$connection->query("select * from books_category where category='$book_category'");
          	$row=$result->fetch_array();
          	$category_id=$row['id'];
          	$number_books=$row['number_books'];

            $number_books2=$number_books+1;

  	        $connection->query("insert into books (book_category,book_name,description,uploaded_book,user_name,date,university,status)
  			  	values('$book_category','$book_name','$description','$uploaded_book_name','$user_name','$date2','$university','Activated')");

  					$connection->query("update books_category set number_books='$number_books2'where id='$category_id'");

  	        $connection->query("INSERT INTO history (data,action,date,user)VALUES('$book_name', 'Added New Book', NOW(),'$user_name')");

            return "success";

          }else{

            return "none";

          }


  }


  public static function uploadProfilePicture(){

  }


}

?>
