<?php

  if (isset($_POST['lang']) && $_POST['lang'] == 'bn') {
    $_SESSION["Lang"] = $_POST['lang'];
  }
  else if (isset($_POST['lang']) && $_POST['lang'] == 'en') {
    $_SESSION["Lang"] = $_POST['lang'];
  }
  else if(isset($_POST['lang']) && ($_POST['lang'] != 'bn' || $_POST['lang'] != 'en')){
    $error = "Unsupported language";
    include '../view/common/errorview.php';
  }

  if ($_SESSION["Lang"] == 'bn') {
    $language = 'bn_BD.utf8';
  }
  putenv("LANG=" .$language);
  setlocale(LC_ALL, $language);
  $domain = "Lang_bn_BD";
  $encodeing = 'UTF-8';
  bindtextdomain($domain,'../locale');
  bind_textdomain_codeset($domain, $encodeing);
  textdomain($domain);
 ?>
