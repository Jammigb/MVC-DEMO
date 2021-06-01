<?php
  include '../model/model.php';

  class Showresultcontroller {
    public function result() {
      include '../view/results.php';

      if (isset($_POST['submit'])) {
        $rid = $_POST['rid'];
        if (is_numeric($rid)) {
          $handle = fopen("result_$rid.txt", "r");

          if (!$handle) {
            include '../view/showresultcontrollerview.php';
          }
          else {
            function isTreeNode($from_array, $to_array) {
             foreach($from_array as $from_id) {
                $found_in_to_array = false;
                foreach($to_array as $to_id) {
                  if ($from_id == $to_id) {
                      $found_in_to_array = true;
                      break;
                   }
                 }
                 if ($found_in_to_array == false) {
                   return true;
                 }
              }
              return false;
             }

             $location_from_array = array();
             $location_to_array = array();
             $count = 0;

             while (!feof($handle)) {
               $data = fgets($handle);
               $len = strlen( $data);
               $len -= 2;

               if ($data [0] == 'x' && $data[$len] == "1") {
                 $data = str_ireplace("x","","$data");
                 $data = str_ireplace(" 1","","$data");
                 $data = explode ("_", $data);
                 $from_location_id = preg_replace('/\s+/', '', $data[0]);
                 $to_location_id = preg_replace('/\s+/', '', $data[1]);

                 include '../view/printlocationview.php';

                 $location_from_array[$count] = $from_location_id;
                 $location_to_array[$count] = $to_location_id;
                 $count++;
               }
             }
             try {
               if (isTreeNode($location_from_array, $location_to_array) == true) {
                  $error = '<br/>Invalid tree result';
                  throw new customException($error);
               }
             }
             catch (customException $error) {
               $error->errorMessage();
             }

             $current_location = $location_from_array[0];
             $common =  getLocationName($current_location);
             include '../view/common/commonview.php';

             $flag = $count - 1;
             for($i=0; $i<$count; $i++) {
               for($j=0; $j<$count; $j++) {
                 if ($current_location == $location_from_array[$j]) {
                   $current_location = $location_to_array[$j];

                   if ($flag) {
                     $error = " -> ";
                     include '../view/common/errorview.php';
                   }
                   if (!$flag--) return false;
                   echo getLocationName($current_location);
                 }
               }
             }
          }
          return false;
        }
        else {
          $error = "Enter valid reference Id.";
          include '../view/common/errorview.php';
        }
      }
    }
  }

 ?>
