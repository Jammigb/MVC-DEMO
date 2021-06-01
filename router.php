<?php
  class Rout {
    public $controller = 'Index';
    public $method = 'method';
    public $parm;

    public function __construct() {
      $url = $this->url();
      if( !empty($url)) {
        if(file_exists("../controller/".$url[0].".php")) {
          $this->controller = $url[0];  ////$url[0] is the controller class in which we are going to operate//
          unset($url[0]);
        }
        else {
          $error = 'Class not found';
          include 'view/common/errorview.php';
        }
      }
      include "../controller/".$this->controller.".php";
      $this->controller = new $this->controller;

      if(isset($url[1]) && !empty($url[1])) {

        if(method_exists($this->controller, $url[1])) {
          $this->method = $url[1];  ////$url[1] is the controller class method in which we are going to operate//
          unset($url[1]);
        }
        else {
          $error = 'Method not found';
          include 'view/common/errorview.php';
        }
      }
      if(isset($url[2]) && !empty($url[2])) {
        $this->parm = $url[2];  ////$url[2] is the controller class methods parameter//
        unset($url[2]);
      }
      call_user_func([$this->controller, $this->method],$this->parm);
    }

    public function url() {
      if( isset($_GET['url'])) {
        $url = $_GET['url'];
        $url = trim($url);   ////this will remove any unwanted spaces from the $url//
        $url = rtrim($url);  ////thi will rwmove any extra backslash on the right from the $url//
        $url = filter_var($url, FILTER_SANITIZE_URL);  ////this will remove any special charecter from the $url//
        $url = explode("/", $url);

        return $url;
      }
    }
  }
 ?>
