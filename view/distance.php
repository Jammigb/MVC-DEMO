<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta name="generator" content="Bluefish 2.2.11" />
  <meta charset="utf-8" />
  <?php
       require_once('include_css.php');
       require '../config/site_config.php';
  ?>
</head>
<body>

  <form class="pure-form pure-form-stacked" action="<?php echo $site_url; ?>Insertdatacontroller/insertInDistance" method="post">
    <p>from location id:</p><input type="number" name="fromlocid" />
    <p>to location id:</p><input type="number" name="tolocid" />
    <p>distance:</p><input type="number" name="dis" /><br /><br />
    <button type="submit" class="pure-button pure-button-primary" name=
    "submit" value="submit">Submit</button>
  </form>
  </body>
</html>
