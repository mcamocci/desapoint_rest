<?php

class FileHandler{


public static function uploadNotes($firstName,$lastName,
$username,$file,$description,$subject,$name){

        $user_name=$username;
        $subject=$subject;
        $notes_name=mysql_escape_string($_POST['notes_name']);
        $date2=date('y-m-d');
        $notes_category=$category;
        $description=mysql_escape_string($description);


        $university=$_POST['university'];

        /* GETING ACADEMIC YEAR */
        $result_get2=mysql_query("select * from  academic_year");
        $get_row2=mysql_fetch_array($result_get2);
        $academic_year=$get_row2['academic_year'];


        /* GETING IDS FOR MAKING DIFFERENCE IN CONTENTS */
        $result_get=mysql_query("select * from notes ORDER BY `id` DESC");
        $get_row=mysql_fetch_array($result_get);
        $last_id=$get_row['id'];
        $next_id=$last_id+1;
        $new_id='DESAPOINT_'.$next_id.'_';


        $notes_upload= addslashes(file_get_contents($_FILES['notes_upload']['tmp_name']));
        $notes_upload_name= addslashes($new_id.$_FILES['notes_upload']['name']);
        $notes_upload_size= getimagesize($_FILES['notes_upload']['tmp_name']);

        move_uploaded_file($file["tmp_name"],"notes/" .$new_id. $_FILES["notes_upload"]["name"]);
        $location="notes/" .$new_id. $_FILES["notes_upload"]["name"];

        $result=mysql_query("select * from subjects where subject='$subject'");
        $row=mysql_fetch_array($result);
        $subject_id=$row['id'];
        $notes_number=$row['notes_number'];

        $notes_number2=$notes_number+1;


        mysql_query("insert into notes (subject,notes_name,description,notes_upload,user_name,status,university,notes_category,date,notes_year)
              values('$subject','$notes_name','$description','$notes_upload_name','$user_name','Activated','$university','$notes_category','$date2','$academic_year')") or die(mysql_error());

        mysql_query("update subjects set notes_number='$notes_number2' where id='$subject_id'")or die(mysql_query);

        mysql_query("INSERT INTO history (data,action,date,user)VALUES('$notes_name', 'Added New Notes', NOW(),'$user_name')")or die(mysql_error());



  }

  public static function uploadArticle(){

              $user_name=$_POST['user_name'];
            	$subject=$_POST['subject'];
            	$writter=$_POST['writter'];
            	$article_name=$_POST['article_name'];
            	//$article_file=$_POST['article_file'];
            	$article_notes=$_POST['article_notes'];
            	$university=$_POST['university'];

    	        if($_FILES['article_file']['tmp_name']!=''){
    					$article_file= addslashes(file_get_contents($_FILES['article_file']['tmp_name']));
    					$article_file_name= addslashes($_FILES['article_file']['name']);
    					$article_file_size= getimagesize($_FILES['article_file']['tmp_name']);

    					move_uploaded_file($_FILES["article_file"]["tmp_name"],"articles/" . $_FILES["article_file"]["name"]);
    					$location="articles/" . $_FILES["article_file"]["name"];
    					}else{
    					$article_file_name='';
    					}

            	$result=mysql_query("select * from subjects where subject='$subject'");
            	$row=mysql_fetch_array($result);
            	$subject_id=$row['id'];
            	$number_articles=$row['number_articles'];

              $number_articles2=$number_articles+1;


            	mysql_query("insert into aticles (subject,writter,article_name,article_notes,article_file,user_name,status,university)
            				values('$subject','$writter','$article_name','$article_notes','$article_file_name','$user_name','Activated','$university')") or die(mysql_error());

    											mysql_query("update subjects set
              number_articles='$number_articles2'
              where id='$subject_id'")or die(mysql_query);


              mysql_query("INSERT INTO history (data,action,date,user)VALUES('$article_name', 'Added New Article', NOW(),'$user_name')")or die(mysql_error());



  }

  public static function uploadBook(){

         $university=$_POST['university'];
	       $user_name=$_POST['user_name'];
	       $book_category=$_POST['book_category'];
	       $book_name=mysql_escape_string($_POST['book_name']);
         $date2=date('y-m-d');
	       $description=mysql_escape_string($_POST['description']);

          /* GETING IDS FOR MAKING DIFFERENCE IN CONTENTS */
      	  $result_get=mysql_query("select * from books ORDER BY `id` DESC");
      	  $get_row=mysql_fetch_array($result_get);
      	  $last_id=$get_row['id'];
      	  $next_id=$last_id+1;
      	  $new_id='DESAPOINT_'.$next_id.'_';

					$uploaded_book= addslashes(file_get_contents($_FILES['uploaded_book']['tmp_name']));
					$uploaded_book_name= addslashes($new_id.$_FILES['uploaded_book']['name']);
					$uploaded_book_size= getimagesize($_FILES['uploaded_book']['tmp_name']);

					move_uploaded_file($_FILES["uploaded_book"]["tmp_name"],"books/" .$new_id.$_FILES["uploaded_book"]["name"]);
					$location="books/" .$new_id.$_FILES["uploaded_book"]["name"];

        	$result=mysql_query("select * from books_category where category='$book_category'");
        	$row=mysql_fetch_array($result);
        	$category_id=$row['id'];
        	$number_books=$row['number_books'];

          $number_books2=$number_books+1;

	        mysql_query("insert into books (book_category,book_name,description,uploaded_book,user_name,date,university,status)
			  	values('$book_category','$book_name','$description','$uploaded_book_name','$user_name','$date2','$university','Activated')") or die(mysql_error());

											mysql_query("update books_category set
          number_books='$number_books2'
          where id='$category_id'")or die(mysql_query);


	         mysql_query("INSERT INTO history (data,action,date,user)VALUES('$book_name', 'Added New Book', NOW(),'$user_name')")or die(mysql_error());




  }


  public static function uploadProfilePicture(){

  }


}

?>