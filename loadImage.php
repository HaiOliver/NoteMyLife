<?php
session_start();
include("connection.php");

// Testing 
$_SESSION['logIn'] = 1;

$user_id = $_SESSION['logIn'];

if(isset($user_id)){
    $sql ="SELECT picture_id,file_name from pictures where user_id ='$user_id' " ;
    if($result=$mysqli->query($sql)){
        if(mysqli_num_rows($result)>0){
            $_SESSION['numberImage']= mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)){
                $path = $row['file_name'];
                $id = $row['picture_id'];
            
                echo "
                <img src='$path' id='image$id' style='height:250px ; width:300px ; marginTop:10px ;'   >
                " ;

            }
        }
        
    }else{
        echo "result loadImage.php from mysqli->query = false ";
    }

}else{
    echo "no quote from DB, loadimage.php fail";
}







?>
