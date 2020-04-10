      <!-- Php log in code -->
<?php
  // grab the name
  session_start();
  include("connection.php");


  $email = $_POST['email'];
  $password = ($_POST['password']);
  
  

  //Testing=================================
  if(!filter_var( $email, FILTER_VALIDATE_EMAIL)){
    echo('This email is not valid!');
    exit(' <a href="index.php">Return to homepage and <strong>sign Up again</strong>  </a>');
  }

  //===============================================
  // Database connection
  // $conn = new mysqli('localhost', 'root', '1234', 'notes');
  $select = mysqli_query($mysqli, "SELECT `email` FROM `users` WHERE `email` = '".$_POST['email']."'") or die(mysqli_error($mysqli));
  if(mysqli_num_rows($select)) {
      echo('This email is already being used!');
      exit(' <a href="index.php">Return to homepage</a>');
  }
  if ($mysqli -> connect_error) {
    die('Connection failed : '.$mysqli->connect_error);
  } else {
    $stmt = $mysqli->prepare("insert into users(email, userPassword)values(?,?)");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    echo "Registration successful...";
    $_SESSION['logIn']= $mysqli->insert_id;
    $_SESSION['email']= $email;
    $_SESSION['signUp']= true;
    header('Location: afterLogIn.php');
    exit();
   

    $stmt->close();
    $mysqli->close();
  }
?>