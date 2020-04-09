<?php
session_start();

// unset($_SESSION['logIn']);
// unset($_SESSION['email']);
// unset($_SESSION['numberNote']);
// unset($_SESSION['numberQuote']);
// unset($_SESSION['numberVideo']);
// unset($_SESSION['numberImage']);
// unset($_SESSION['signUp']);

// set log out true
$_SESSION['logOut']= true;
session_destroy();
header("location:index.php?logOut=true");
// header("location:index.php");
?>