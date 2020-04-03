<?php
session_start();
include('connection.php') ;
if(isset($_SESSION['logIn'])){
    $node_id = $_POST['nodeId'];
    echo $node_id;
    $content_node = $_POST['noteContent'];;
    $sql = "INSERT INTO noteContent('note_id','user_id','content') 
    VALUES('$node_id','$user_id','$content_node') ";
    
    if($myqli->query($sql)=== TRUE){
        echo "note".$node_id ."added to database";
    }else{
        echo "Error: " . $sql . "<br>" . $myqli->error;
    }
    $myqli->close();
}else{
    echo "user doesnot log in";
}








?>