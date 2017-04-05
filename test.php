<?php

    require_once("Database.php");

    $user_id=11;
    $query="SELECT * FROM user_settings WHERE User_id = '$user_id'";
    $database=new Database();
    $resultset=$database->connection->query($query);

    $row=$resultset->fetch_array();
    echo $row['university'];
    echo $row['college'];

    $date=date('d/m/Y');
    echo $date;


?>
