<?php
    $records = getLocations();
    foreach ($records as $data) {
      include '../view/getlocationscontroller.php';
    }
?>
