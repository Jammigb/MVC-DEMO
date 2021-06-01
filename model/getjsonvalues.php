<?php

  class ProductGetter {
    private $trackingno;
    private $consigneename;
    private $address;
    private $area;
    private $district;
    private $mobile;
    private $paymentmode;
    private $codamount;
    private $weigh;
    private $length;
    private $height;
    private $width;

    public function __construct( $trackingno, $consigneename, $address, $area, $district
    , $mobile, $paymentmode, $codamount, $weigh, $length, $height, $width) {
      $this->trackingno = $trackingno;
      $this->consigneename = $consigneename;
      $this->address = $address;
      $this->area = $area;
      $this->district = $district;
      $this->mobile = $mobile;
      $this->paymentmode = $paymentmode;
      $this->codamount = $codamount;
      $this->weigh = $weigh;
      $this->length = $length;
      $this->height = $height;
      $this->width = $width;
    }

    public function getTrackingno() {
      return $this->trackingno;
    }

    public function getConsigneeName() {
      return $this->consigneename;
    }

    public function getAddress() {
      return $this->address;
    }

    public function getArea() {
      return $this->area;
    }

    public function getDistrict() {
      return $this->district;
    }

    public function getMobile() {
      return $this->mobile;
    }

    public function getPaymentmode() {
      return $this->paymentmode;
    }

    public function getCodamount() {
      return $this->codamount;
    }

    public function getWeigh() {
      return $this->weigh;
    }

    public function getLength() {
      if(is_numeric($this->length)) {
        return $this->length;
      }
      else {
        return 0;
      }
    }

    public function getHight() {
      if(is_numeric($this->height)) {
        return $this->height;
      }
      else {
        return 0;
      }
    }

    public function getWidth() {
      if(is_numeric($this->width)) {
        return $this->width;
      }
      else {
        return 0;
      }
    }
  }
 ?>
