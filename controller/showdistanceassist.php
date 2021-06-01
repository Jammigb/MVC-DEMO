<?php

  $loc1_error = $loc2_error = $location1 = $location2 = '';

  if (isset($_POST['submit'])) {

    if(empty($_POST['name1'])) {
      $loc1_error = 'Select first location';
    }
    else {
      $location1 = $_POST['name1'];
    }

    if (empty($_POST['name2'])) {
      $loc2_error = 'Select second location';
    }
    else {
      $location2 = $_POST['name2'];
    }

    if ($location1 && $location2) {
      $radius_max = get_radius($location1);
      $radius_min = get_radius($location2);
      $lat_long_obj1 = getlatlong_obj($location1);
      $lat_long_obj2 = getlatlong_obj($location2);

      $fin_radius = ($radius_max + $radius_min)/2;

      (float)$latitude1 = $lat_long_obj1->getlatitude();
      (float)$longitude1 = $lat_long_obj1->getlongitude();
      (float)$latitude2 = $lat_long_obj2->getlatitude();
      (float)$longitude2 = $lat_long_obj2->getlongitude();

      $dLat = ($latitude2-$latitude1) * 0.017453292519943295;//0.017453292519943295; is the valur of ( pi / 180)//
      $dLon = ($longitude2-$longitude1) * 0.017453292519943295;
      $pre_cal_val =
      asin($dLat/2) * asin($dLat/2) +
      acos($latitude1 * 0.017453292519943295) * acos($latitude2 * 0.017453292519943295) *
      asin($dLon/2) * asin($dLon/2);
      $pre_res = 2 * atan2(sqrt($pre_cal_val), sqrt(1-$pre_cal_val));
      $distance =  $fin_radius * $pre_res;

      include "../view/view_distance.php";
    }
  }
 ?>
