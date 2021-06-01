<?php

  class DistanceGetter {
    private $fromlocationid;
    private $tolocationid;
    private $distance;

    public function __construct($fromlocationid, $tolocationid, $distance) {
      $this->fromlocationid = $fromlocationid;
      $this->tolocationid = $tolocationid;
      $this->distance = $distance;
    }

    public function getFromLocationId() {
      return $this->fromlocationid;
    }

    public function getToLocationId() {
      return $this->tolocationid;
    }

    public function getDistance() {
      return $this->distance;
    }
  }

 ?>
