<?php
session_start();
include('connection.php') ;
// Testing 
// $_SESSION['logIn'] = 1;



if(isset($_SESSION['logIn'])){
    $user_id = $_SESSION['logIn'];
    $content_node = $_POST['noteContent'];
    
    //sql
    $sql = "INSERT INTO noteContent(user_id,content) 
    VALUES('$user_id','$content_node') ";
    
    
    if($mysqli->query($sql)== TRUE){
        echo "success save Note on DB";
    }else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $mysqli->close();
}else{
    echo ("user doesnot log in");
}








?>