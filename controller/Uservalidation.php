<?php
  include "../model/model.php";

  function confirmUser($uname, $password) {
    if (isUser($uname, $password)=== true) {
      return true;
    }
  }
 ?>
