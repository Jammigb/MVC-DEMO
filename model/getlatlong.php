<?php

  class LatLongGetter {
    private $latitude;
    private $longitude;

    public function __construct($latitude, $longitude) {
      $this->latitude = $latitude;
      $this->longitude = $longitude;
    }

    public function getlatitude() {
      return $this->latitude;
    }

    public function getlongitude() {
      return $this->longitude;
    }
  }
 ?>
