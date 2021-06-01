<?php
  include '../errorhandler/errorhandler.php';

  class Filecontroller {
    public function getFile() {
      include '../view/requests.php';
      if (isset($_POST['json'])) {
        $file_name = $_FILES['file']['name'];
        $file_ext = strtolower(end(explode('.',$file_name)));
        $file_temp_loc = $_FILES['file']['tmp_name'];
        $file_store = "upload/".$file_name;
        $extensions= array("csv","json");

        try {
          if (in_array($file_ext,$extensions)=== false) {
            $error="Invalid extension, please choose a csv or json file";
            throw new customException($error);
          }
          else {
            try {
              if (move_uploaded_file($file_temp_loc,$file_store)) {
                require_once('insertdatacontroller.php');

                $insertjson = new insertdatacontroller();
                $insertjson->insertInUsersInfo($file_name);
              }
              else {
                $error = 'Failed to upload';
                throw new customException($error);
              }
            }
            catch (customException $error) {
              $error->errorMessage();
            }
          }
        }
        catch (customException $error) {
          $error->errorMessage();
        }
      }
    }
  }
?>
