<?php
  include "../model/model.php";

  class Insertdatacontroller {
    public function insertInDistance() {
      include '../view/distance.php';

      if (isset($_POST['submit'])) {
        if (empty($_POST['fromlocid']) || empty($_POST['tolocid']) || empty($_POST['dis'])){
          $error = "Field can't be empty.";
          include '../view/common/errorview.php';
        }
        else {
          $fromlocationid = $_POST['fromlocid'];
          $tolocationid = $_POST['tolocid'];
          $distance = $_POST['dis'];

          if ((!preg_match ("/^[a-zA-z]*$/", $locName)) || (!preg_match ("/^[a-zA-z]*$/", $address))) {
              $error = "Only alphabets and whitespace are allowed.";
              include '../view/common/errorview.php';
              if ((!is_numeric($distance))) {
                $error = "Only numeric value is allowed.";
                include '../view/common/errorview.php';
              }
          }
          else {
            $dis_data = new DistanceGetter($fromlocationid,$tolocationid,$distance);
            insertIntoDistance($dis_data);
          }
        }
      }
    }

    public function insertInLocations() {
      include '../view/locations.php';
      if (isset($_POST['submit'])) {
        if (empty($_POST['loc_name']) || empty($_POST['address'])){
          $error = "Feild can't be empty.";
          include '../view/common/errorview.php';
        }
        else {
          $locName = $_POST['loc_name'];
          $address = $_POST['address'];

          if ((!preg_match ("/^[a-zA-z]*$/", $locName)) || (!preg_match ("/^[a-zA-z]*$/", $address))) {
              $error = "Only alphabets and whitespace are allowed.";
              include '../view/common/errorview.php';
          }
          else {
            $loc_data = new LocAddGetter($locName,$address);
            insertIntoLocations($loc_data);
          }
        }
      }
    }

    public function insertInUsersInfo($file_name) {
      try {
        require_once('../config/site_config.php');
        $file_loc = $site_url."upload/".$file_name;

        if (file_exist($file_loc)) {
          exec("cd upload && perl csv_to_json.pl $file_name output.json");
          $jsondata = file_get_contents("upload/output.json");
          $json = json_decode($jsondata,true);

          foreach ($json as $value){
            $js_data = new ProductGetter($value['Tracking No'],$value['Consignee Name'],$value['Address'],$value['Area'],$value['District'],
            $value['Mobile'],$value['Payment Mode'],$value['Cod Amount'],$value['Weight'],$value['length'],$value['height'],$value['width']);
            insert_in_db($js_data);
          }
          exec("cd upload && rm -R output.json");
        }
        else {
          $error = "File doesn't exist.";
          throw new customException($error);
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    public function insertInclients() {
      try {
        include '../view/clientsform.php';

        if( isset($_POST['submit'])) {
          $clientid = $_POST['client_id'];
          $campanyid = $_POST['company_id'];
          if () {

          }
          else {
            $error = "Client id & Company id can't be empty.";
            throw new customException($error);
          }
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    public function insertIncompanis() {
      try {
        include '../view/companisform.php';

        if( isset($_POST['submit'])) {
          $companyid = $_POST['company_id'];
          $problemid = $_POST['problem_id'];
          if () {

          }
          else {
            $error = "Company id & Problem id can't be empty.";
            throw new customException($error);
          }
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    public function insertIndelevery_address() {
      try {
        include '../view/delevery_addressform.php';

        if( isset($_POST['submit'])) {
          $clientid = $_POST['client_id'];
          $delevaddress = $_POST['delevery_address'];
          if () {

          }
          else {
            $error = "Client id & Delevery address can't be empty";
            throw new customException($error);
          }
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    public function insertInorders() {
      try {
        include '../view/ordersform.php';

        if( isset($_POST['submit'])) {
          $clientid = $_POST['client_id'];
          $addressid = $_POST['address_id'];
          if () {

          }
          else {
            $error = "Client id & Address id can't be empty";
            throw new customException($error);
          }
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    public function insertInvehicles() {
      try {
        include '../view/vehiclesform.php';

        if( isset($_POST['submit'])) {
          $vehicleid = $_POST['vehicle_id'];
          $veh_max_cap = $_POST['vehicle_max_capacity'];
          $veh_cost_per_hour = $_POST['vehicle_cost_per_hour'];
          if () {

          }
          else {
            $error = "Vehicle id & Vehicle max capacity & Vehicle cost per hour can't be empty";
            throw new customException($error);
          }
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    public function insertInvehicle_status() {
      try {
        include '../view/vehicle_statusform.php';

        if( isset($_POST['submit'])) {
          $clientid = $_POST['client_id'];
          $addressid = $_POST['address_id'];
          $packageweight = $_POST['package_weight'];
          $first_deleve_date = $_POST['first_delevery_date'];
          $last_delevery_date = $_POST['last_delevery_date'];
          if () {

          }
          else {
            $error = "Client id & Address id & Package weight & First delevery date & Last delevery date can't be empty";
            throw new customException($error);
          }
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }
  }
  ?>
