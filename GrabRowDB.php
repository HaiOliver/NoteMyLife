<?php
session_start();
include("connection.php");

// Testing 
// $_SESSION['logIn'] = 1;

$user_id = $_SESSION['logIn'];



if(isset($user_id)){
    $quote ="SELECT quote_id,author,quote_text from quotes where user_id ='$user_id' " ;
    $numberQuote = mysqli_num_rows($mysqli->query($quote));
    
    $note ="SELECT * from noteContent where user_id ='$user_id' " ;
    $numberNote = mysqli_num_rows($mysqli->query($note));   
    
    $picture ="SELECT * from pictures where user_id ='$user_id' " ;
    $numberPicture = mysqli_num_rows($mysqli->query($picture)); 
    
    $video ="SELECT * from videos where user_id ='$user_id' " ;
    $numberVideo = mysqli_num_rows($mysqli->query($video));   
    
    $database = array($numberNote,$numberQuote,$numberVideo,$numberPicture);
    echo json_encode($database);

}else{

    echo "no quote from DB, loadQuote.php fail";
    echo "user_id in loadQuote.php".$user_id;
}







?>
