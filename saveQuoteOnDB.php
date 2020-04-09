<?php
session_start();
include('connection.php');

// Testing 
// $_SESSION['logIn'] = 1;

if(isset($_SESSION['logIn'])){
    $user_id = $_SESSION['logIn'];
    $author = $_POST['author'];
    $quote_text = $_POST['quote_text'];
    $quote_id = $_POST['quote_id'];
    
    
    $sql = "INSERT INTO quotes(user_id,author,quote_text) VALUES('$user_id','$author','$quote_text')";

    if($mysqli->query($sql)===TRUE){
        echo "successful save quote on saveQuoteOnDB()";
    }else{
        echo "Error from saveQuoteOnDB(): ".$mysqli->error;
    }

    $mysqli->close();

}else{
    echo "quote doesnot exist on database";
}




?>
