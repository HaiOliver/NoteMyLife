<?php
session_start();
include('connection.php');

// Testing 
$_SESSION['logIn'] = 1;

if(isset($_SESSION['logIn'])){
    $user_id = $_SESSION['logIn'];
    $path = $_POST['file'];
   
    
    $sql = "INSERT INTO pictures(user_id,file_name) VALUES('$user_id','$path')";

    if($mysqli->query($sql)===TRUE){
        echo "successful save Image on saveImageOnDB()";
    }else{
        echo "Error from saveImageOnDB(): ".$mysqli->error;
    }

    $mysqli->close();

}else{
    echo "Image doesnot exist on database";
}




?>
