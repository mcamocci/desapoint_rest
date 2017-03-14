<?php

class Database{


    var $connection;

    function __construct($host="localhost",$username="root",$password="haikarose",$database="projectx"){    
        $this->connection=new mysqli($host,$username,$password,$database);            
    }
    
    public function getSubjectList(){
        
            $querry="";   
                              
            $resultset=$this->connection->query($querry);            
            $subjects=array();
            
            while($row=$resultset->fetch_assoc()){                
                   $subjects[]=$row;            
            }
            
            return $subjects;
    
    }
    
      
    public function getAllBooks(){
        
            $querry=null;
                 
            $querry="";   
                 
            $resultset=$this->connection->query($querry);            
            $books=array();
            
            while($row=$resultset->fetch_assoc()){                
                    $books[]=$row;            
            }
            
            return $books;
    
    }
    
    
       public function getAllArticles(){
    
    
            $querry=null;
    
             
            $querry="";   
                 
            $resultset=$this->connection->query($querry);            
            $articles=array();
            
            while($row=$resultset->fetch_assoc()){                
                    $books[]=$row;            
            }
            
            return $articles;
    
    }
   
    
    public function getAllRequestedBooks(){
    
                $querry="";            
                $resultset=$this->connection->querry();
                
                $books;
                
                while($row=$resultset->fetch_assoc()){                
                        $books[]=$row;            
                }
                
                return $books;    
    
    }
    
   

    public function approveLoginUser($username,$password){    
    
        $querry="select distinct * from User where username=? and password=?";
        $statement=$connection->prepare($querry);
        $statement->bind_params("binded",$username,$password);
       
        $success=0;
        
        while($row=$statement->$statement->querry()->fetch_assoc()){
        
           $_SESSION["USER_ID"]=$row["identification_number"];
           $succes=1;      
        } 
        
        if($success==1){
            session_start();
            header("Location: ");   
        }
    }
    
       
    public function registerUser(){   
             
    
    }
    
      
    public function getCountArticles(){
        $querry=""; 
        $resultset=$this->connection->query($querry);
        $count=0;
        while($row=$resultset->fetch_assoc()){
            $count=$row['total'];
        }
        
        return $count;
    }
    
    
    public function getCountBooks(){
        $querry=""; 
        $resultset=$this->connection->query($querry);
        $count=0;
        while($row=$resultset->fetch_assoc()){
            $count=$row['total'];
        }
        
        return $count;
    }
    
   
    
}


   



?>
