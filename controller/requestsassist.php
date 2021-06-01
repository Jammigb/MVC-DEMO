<?php

  $error = '';
  if (isset($_POST['jsdat'])) {
    $data = $_POST['jsdat'];
    $isjson = json_decode($data,true);
    if ($isjson === null) {
      $error = "Please enter valid json";
    }
    else {
      $request_id = enterJsonInDb($data);
      include '../view/viewrequestid.php';
    }
  }

 ?>
