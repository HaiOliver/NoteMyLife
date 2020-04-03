<?php
// $link = mysqli_connect("localhost", "root", "1234", "notes");
// if(mysqli_connect_error()){
//     die('ERROR: Unable to connect:' . mysqli_connect_error()); 
//     echo "<script>window.alert('Hi!')</script>";
// }
$mysqli = new mysqli('localhost','root','1234','notes');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

    ?>