<?php
  class LocAddGetter {
    private $location;
    private $address;

    public function __construct($location, $address) {
      $this->location = $location;
      $this->address = $address;
    }

    public function getLocationName() {
      return $this->location;
    }

    public function getAddress() {
      return $this->address;
    }
  }

 ?>
