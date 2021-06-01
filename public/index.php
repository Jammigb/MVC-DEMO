<?php
  session_start();

  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    include '../router.php';

    if(Rout::url() == NULL) {
      require '../config/site_config.php';
      require_once '../view/verticalindexView.php';
      unset($_GET['url']);
    }
    else {
      require '../view/horizontalindexView.php';
      $url = new Rout();
    }
  }
  else {
    require '../view/loginform.php';
  }
?>
