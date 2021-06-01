<?php
include '../config/site_config.php';

class Sessioncontroller {
  public function endsession() {
    session_destroy();
    header("location: $site_url");
    exit;
  }
}
 ?>
