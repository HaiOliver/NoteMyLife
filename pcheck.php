<?php
session_start();
include("connection.php");
// $mysqli = new mysqli('localhost','root','1234','notes');

//output error

// if($mysqli->connect_error){
//     die('Error:('.$mysqli->connect_errno.')'.$mysqli->connect_error);
// }


$email =  mysqli_real_escape_string($mysqli, $_POST['emailLogIn']);
// echo $email ." will be";

$password = mysqli_real_escape_string($mysqli,  $_POST['passwordLogIn']);

$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error());
$num_row = mysqli_num_rows($result);

$row = mysqli_fetch_array($result);

// echo $num_row;
if ($num_row >= 1) {
    
    
    if ($password == $row['userPassword']) {
       
        $_SESSION['logIn'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
        
        echo'yes';
    }
    else {
       
        echo strip_tags('no');
    }

} else {
    
    echo strip_tags('no');
}











?>