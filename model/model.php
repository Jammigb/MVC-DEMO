  <?php
     require_once("dbh.php");
     require("getjsonvalues.php");
     require("getlatlong.php");
     require("getlocaddr.php");
     require("getdistancevalues.php");
     include '../errorhandler/errorhandler.php';

     function get_radius($location1) {
       try {
         $instance = Dbh::getInstance();
         $sql = 'SELECT max_radius FROM location_table WHERE area_name = :name';
         $rad = $instance->prepare($sql);
         $rad->execute(['name' => $location1]);

         if (!$rad) {
           $error = 'Radius query Error';
           throw new customException($error);
         }
         $rad_1 = $rad->fetch();
         return $rad_1[0];
       }
       catch (customException $error) {
         $error->errorMessage();
       }
     }

     function insert_in_db($data) {
       try {
         $instance = Dbh::getInstance();
         $ins = $instance->prepare("INSERT INTO users_info (tracking_no, consignee_name, address,area, district,mobile,
         paymentmode, codamount, weight, length, height, width) VALUES (:tracking_no, :consignee_name, :address, :area,
         :district, :mobile, :paymentmode, :codamount, :weigh, :length, :height, :width)");

         $ins->execute(['tracking_no' => $data->getTrackingno(), 'consignee_name'=> $data->getConsigneeName(), 'address' => $data->getAddress(), 'area' => $data->getArea(), 'district' => $data->getDistrict(), 'mobile' =>
         $data->getMobile(), 'paymentmode' => $data->getPaymentmode(), 'codamount' => $data->getCodamount(), 'weigh' =>
         $data->getWeigh(), 'length' => $data->getLength(), 'height' => $data->getHight(), 'width' => $data->getWidth()]);

         if (!$ins) {
           $error = 'Json insert Error';
           throw new customException($error);
         }
       }
       catch (customException $error) {
        $error->errorMessage();
       }
     }

    function getlatlong_obj($location) {
      try {
        $instance = Dbh::getInstance();
        $lat_long = $instance->prepare('SELECT latitude, longitude FROM location_table WHERE area_name = :name');
        $lat_long->execute(['name'=>$location]);

        if (!$lat_long) {
          $error = 'Latitude Longitude Query Error';
          throw new customException($error);
        }
        $lat_long_obj = $lat_long->fetch(PDO::FETCH_ASSOC);
        $latlon = new LatLongGetter($lat_long_obj['latitude'],$lat_long_obj['longitude']);
        return $latlon;
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    function insertIntoLocations($data) {
      try {
        $instance = Dbh::getInstance();
        $sql = 'INSERT INTO locations (location_name,address) Values (:location_name, :address)';
        $locAdd = $instance->prepare($sql);
        $locAdd->execute(['location_name' => $data->getLocationName(), 'address'=> $data->getAddress()]);

        if (!$locAdd) {
          $error = 'Location Insert Error';
          throw new customException($error);
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    function insertIntoDistance($data) {
      try {
        $instance = Dbh::getInstance();
        $disIns = $instance->prepare("INSERT INTO distance (from_location_id, to_location_id, distance)
        Values (:fromlocationid, :tolocationid, :distance)");
        $disIns->execute(['fromlocationid'=>$data->getFromLocationId(), 'tolocationid'=>$data->getToLocationId(), 'distance'=>$data->getDistance()]);

        if (!$disIns){
          $error = 'Distance Insert Error';
          throw new customException($error);
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    function enterJsonInDb($data) {
      try {
        $instance = Dbh::getInstance();
        $jsIns = $instance->prepare("INSERT INTO request (json) Values (:json)");
        $jsIns->execute(['json'=>$data]);

        if (!$jsIns){
          $error = 'Request Insert Error';
          throw new customException($error);
        }
        return $instance->lastInsertId();
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    function getLocationName($id) {
      try {
        $instance = Dbh::getInstance();
        $locname = $instance->prepare("SELECT location_name FROM locations WHERE location_id = :id");
        $locname->execute(['id'=>$id]);

        if (!$locname) {
          $error = 'Location Name Query Error';
          throw new customException($error);
        }
        $name = $locname->fetch();
        return $name[0];
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    function getJson($id) {
      try {
        $instance = Dbh::getInstance();
        $jq = $instance->prepare("SELECT json FROM request WHERE id=:id");
        $jq->execute(['id' => $id]);

        if (!$jq) {
          $error = 'Json Query Error';
          throw new customException($error);
        }
        return $jq->fetch();
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    function getLocationid($id) {
      try {
        $instance = Dbh::getInstance();
        $locid = $instance->prepare("SELECT location_id FROM locations WHERE location_name=:name");
        $locid->execute(['name' => $id]);

        if (!$locid) {
          $error = "Location id error";
          throw new customException($error);
        }
        return $locid->fetch();
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    function getDistance($val1, $val2) {
      try {
        $instance = Dbh::getInstance();
        $distance = $instance->prepare("SELECT distance FROM distance WHERE from_location_id=:from_location_id AND
        to_location_id=:to_location_id");
        $distance->execute(['from_location_id' => $val1['location_id'], 'to_location_id' => $val2['location_id']]);

        if (!$distance) {
          $error = 'Distance Query Error';
          throw new customException($error);
        }
        return $distance->fetch();
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    function getLocations() {
      try {
        $instance = Dbh::getInstance();
        $locations = $instance->prepare("SELECT area_name From location_table");
        $locations->execute();

        if (!$locations) {
          $error = "Area name error";
          throw new customException($error);
        }
        return $locations->fetchAll();
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }

    function isUser($uname, $password) {
      try {
        $instance = Dbh::getInstance();
        $user = $instance->prepare("SELECT id From user_info WHERE user_name=:user_name AND password=:password");
        $user->execute(['user_name'=>$uname, 'password'=>$password]);
        $isuser = $user->fetch();
        if (!$user){
          $error = "Id error";
          throw new customException($error);
        }
        if ($isuser) {
         return true;
        }
        else {
         return false;
        }
      }
      catch (customException $error) {
        $error->errorMessage();
      }
    }
   ?>
