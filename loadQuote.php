<?php
session_start();
include("connection.php");

// Testing 
// $_SESSION['logIn'] = 1;
 echo "SESSION['logIn'] loadQuote.php will be: ".$_SESSION['logIn']."     need something";
$user_id = $_SESSION['logIn'];

if(isset($user_id)){
    $sql ="SELECT quote_id,author,quote_text from quotes where user_id ='$user_id' " ;
    if($result=$mysqli->query($sql)){
        if(mysqli_num_rows($result)>0){
            $_SESSION['numberQuote']= mysqli_num_rows($result);
            echo " <div class='alert alert-success' role='alert'>
            You have total ". $_SESSION['numberQuote']." quotes so far
          </div> ";
            
            while($row = mysqli_fetch_assoc($result)){
                $quote_id = $row['quote_id'];
                $author = $row['author'];
                $text = $row['quote_text'];
            
                
                echo "<blockquote class='blockquote text-center' id='createQuote$quote_id'>
                    <p id='quoteContent$quote_id' class='mb-0' style='color:red;font-size:30px;'>$text</p>
                    <footer id='author$quote_id' class='blockquote-footer' style='color:blue;font-size:20px;'>$author</footer>

                </blockquote>" ;
                
            }
            
        }else{
            echo "<div class='alert alert-primary' role='alert'> You havenot add any quotes yet </div>";
        }
        
    }else{
        echo "result return from mysqli->query = false ";
    }

}else{

    echo "no quote from DB, loadQuote.php fail";
    echo "user_id in loadQuote.php".$user_id;
}







?>
