<?php

  $user = $pass = $error = $uname = $password = "";

  if (isset($_POST['submit']) === true) {
    if (empty($_POST['loginUsername'])) {
      $user = "Username can not be empty";
    }
    else {
      $uname = $_POST['loginUsername'];
    }

    if (empty($_POST['loginpassword'])) {
      $pass = "Password can not be empty";
    }
    else {
      $password = $_POST['loginpassword'];
    }
    if ($uname && $password) {
      if(confirmUser($uname, $password) == true) {
       echo "string";
       $_SESSION["loggedin"] = true;
       $_SESSION["username"] = isset($_POST['loginUsername']) ? $_POST['loginUsername'] : 'NULL';
       header("location: index.php");
       exit;
      }
      else {
       $error = "Please provide valid username and password";
      }
    }
  }
 ?>
