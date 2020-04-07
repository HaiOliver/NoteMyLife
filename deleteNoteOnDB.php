<?php
session_start();
include('connection.php');

$node_id = $_POST['node_id'];

$sql = " DELETE FROM noteContent WHERE note_id = $node_id";

if($mysqli->query($sql)===TRUE){
    echo "deleted successful from DB";
}else{
    
    echo "Delete fail !!!!!".$mysqli->error; 
}

$mysqli->close();


?>