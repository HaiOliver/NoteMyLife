<?php

Session_start();
include("connection.php");

// Testing 
$_SESSION['logIn'] = 1;

$user_id = $_SESSION['logIn'];

if(isset($user_id)){
    // query
    $sql = "SELECT video_id,user_id,link from videos where user_id = '$user_id' ";
    if( $result= mysqli_query($mysqli,$sql)){
        if(mysqli_num_rows($result)>0){
            $_SESSION['numberVideo'] = mysqli_num_rows($result);
            while( $row = mysqli_fetch_assoc($result)){
                $url_id = $row['video_id'];
                $link = $row['link'];

                echo "
                <div id='divVideo$url_id' class='embed-responsive embed-responsive-4by3'>
                    <iframe  id='video$url_id' class='embed-responsive-item' src='$link'></iframe>
                </div>
                ";
            }
        }else{
            echo "loadUrl.php, row = 0, x exist ";
        }
    }else{
        echo "result return loadUrl.php fail";
    }


}else{
    echo "loadUrl.php fail: url doesnot exist on DB";
}








?>