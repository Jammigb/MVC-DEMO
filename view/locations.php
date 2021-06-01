<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta name="generator" content="Bluefish 2.2.11" />
  <meta charset="utf-8" />
  <?php
       require_once('../view/include_css.php');
       require '../config/site_config.php';
  ?>

</head>
<body>
  <form class="pure-form pure-form-stacked" action="<?php echo $site_url; ?>Insertdatacontroller/insertInLocations" method="post">
  <p>location_id name:</p><input type="text" name="loc_name" />
  <p>address:</p><input type="text" name="address" /><br /><br />
  <button type="submit" class="pure-button pure-button-primary" name=
  "submit" value="submit">Submit</button>
  </form>
  </body>
</html>
