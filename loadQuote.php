<?php
session_start();
include("connection.php");

// Testing 
$_SESSION['logIn'] = 1;

$user_id = $_SESSION['logIn'];

if(isset($user_id)){
    $sql ="SELECT quote_id,author,quote_text from quotes where user_id ='$user_id' " ;
    if($result=$mysqli->query($sql)){
        if(mysqli_num_rows($result)>0){
            $_SESSION['numberQuote']= mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)){
                $quote_id = $row['quote_id'];
                $author = $row['author'];
                $text = $row['quote_text'];
            
                
                echo "<blockquote class='blockquote text-center' id='createQuote$quote_id'>
                    <p id='quoteContent$quote_id' class='mb-0'>$text</p>
                    <footer id='author$quote_id' class='blockquote-footer'>$author</footer>

                </blockquote>" ;

            }
        }
        
    }else{
        echo "result return from mysqli->query = false ";
    }

}else{
    echo "no quote from DB, loadQuote.php fail";
}







?>
