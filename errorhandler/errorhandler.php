<?php
class customException extends Exception {
  public function errorMessage() {
    $error = $this->getMessage();
    include '../view/common/errorview.php';
  }
}
?>
