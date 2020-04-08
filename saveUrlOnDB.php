<?php
session_start();
include("connection.php");

// Testing 
$_SESSION['logIn'] = 1;

if(isset($_SESSION['logIn'])){
    $user_id = $_SESSION['logIn'];
    $url = $_POST['link'];

    
    //query
    $sql = "INSERT INTO videos(user_id,link) VALUES ('$user_id','$url') ";

    if($mysqli->query($sql)===TRUE){
        echo "saveUrlOnDB.php insert success";
    }else{
        echo "saveUrlOnDB.php insert fail";
    }
    $mysqli->close();
}else{
    echo "Url doesnot exist on DB, saveUrlDB.php fail" ;
}




?>