<?php
session_start();
echo "reach here";
unset($_SESSION['logIn']);
unset($_SESSION['email']);
// set log out true
// $_SESSION['logOut']= true;
// session_destroy();
header("location:index.php?logOut=true");
?>