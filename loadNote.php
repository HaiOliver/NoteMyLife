<?php
session_start();
include("connection.php");

// Testing 
// $_SESSION['logIn'] = 1;
echo "SESSION['logIn'] loadNote.php will be: ".$_SESSION['logIn']."     need something";



$user_id = $_SESSION['logIn'];

if(isset($user_id)){
    $sql = "SELECT note_id,content from noteContent where user_id ='$user_id'";
    if($result= mysqli_query($mysqli,$sql)){
        if(mysqli_num_rows($result)>0){
            $_SESSION['numberNote'] = mysqli_num_rows($result);
            echo " <div class='alert alert-success' role='alert'>
            You have total ". $_SESSION['numberNote']." notes so far
          </div> ";
            while($row = mysqli_fetch_assoc($result)){
                $noteNumberFromDB = (int) $row['note_id'];
                
                $noteContentFromDB = $row['content'];
                echo "
                <textarea class='note' id='note".$noteNumberFromDB ."'rows='7' cols='40'>$noteContentFromDB </textarea> <br>
                <button  id='saveButton".$noteNumberFromDB."' style='width:100px; height:50px; margin-left:30px;' class='btn btn-success center-block'>Save</button>
                <button  id='deleteButton".$noteNumberFromDB."' style='width:100px; height:50px; margin-left:10px' class='btn btn-warning center-block'>Delete</button>

                ";
                
            }
            
        }else{
            echo "<div class='alert alert-secondary' role='alert'> You havenot add any notes yet </div>";
        }
    }else{
        echo"mysqli_query cannot return object";
    }
}else{
    echo "user_id in loadNote.php".$user_id;
    echo "no user id in DB";
}






?>