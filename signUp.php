      <!-- Php log in code -->
<?php
  // grab the name
  session_start();


  $email = $_POST['email'];
  $password = ($_POST['password']);

  // Database connection
  $conn = new mysqli('localhost', 'root', '1234', 'notes');
  $select = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '".$_POST['email']."'") or die(mysqli_error($conn));
  if(mysqli_num_rows($select)) {
      echo('This email is already being used!');
      exit(' <a href="index.php">Return to homepage</a>');
  }
  if ($conn -> connect_error) {
    die('Connection failed : '.$conn->connect_error);
  } else {
    $stmt = $conn->prepare("insert into users(email, userPassword)values(?,?)");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    echo "Registration successful...";
    $_SESSION['logIn']= $conn->insert_id;
    $_SESSION['email']= $email;
    $_SESSION['signUp']= true;
    header('Location: afterLogIn.php');
    exit();
   

    $stmt->close();
    $conn->close();
  }
?>