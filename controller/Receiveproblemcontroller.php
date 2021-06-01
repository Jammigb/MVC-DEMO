<?php
  include "../model/model.php";

  class Receiveproblemcontroller {
    public function insertInRequests() {
      include "../view/requests.php";
    }

    public function createComb($id) {
      $jsondata = getJson($id);
      $json = $jsondata['json'];
      $json_ = json_decode($json,true);

      try {

        if (file_exists("mytestfile.txt")){
          $fp = fopen("submitted_problems/problem_$id.txt","w+");
          try {

            if ($id){
              foreach ($json_ as $loc) {
                foreach ($json_ as $locc) {
                  if ($loc['name'] != $locc['name']){
                      $id1 = getLocationid($loc['name']);
                      $id2 = getLocationid($locc['name']);

                      include '../view/createcombview.php';

                      $dis = getDistance($id1,$id2);
                      $distance = $dis['distance'] != '' ? $dis['distance'] : 1;
                      $string_to_write = $id1['location_id'] . " " . $id2['location_id'] . " " . $distance . "\n";
                      fwrite($fp, $string_to_write);
                  }
                }
              }
              fclose($fp);
            }
            else {
              $error = 'File is not ready for the id <br/>';
              throw new customException($error);
            }
          }
          catch (customException $error) {
            $error->errorMessage();
          }
        }
        else {
          $error = 'Unable to open file for writing!<br/>';
          throw new customException($error);
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }
  }
 ?>
