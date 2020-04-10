<?php

$mysqli = new mysqli('localhost','root','1234','notes');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

    ?>