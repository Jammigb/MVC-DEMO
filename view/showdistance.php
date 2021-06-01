<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <style>
  .error {color: #FF00006E;}
  </style>
  <meta name="generator" content="Bluefish 2.2.11" />
  <meta charset="utf-8" />
  <?php
      include('../view/include_css.php');
      require '../config/site_config.php';
      require_once("../config/gettextconfig.php");
      include '../controller/showdistanceassist.php';
  ?>
  <title></title>
</head>
<body>
      <form class="pure-form pure-form-stacked" action="<?php echo $site_url; ?>Showdistancecontroller/get_lat_long_radi" method="post">
        <p><?php echo gettext("First_Location"); ?></p>
        <select name="name1">
         <option disabled selected><?php echo _("Select Location"); ?></option>
          <?php require '../controller/Getlocationscontroller.php'; ?>
       </select>

       <span class="error"><?php echo $loc1_error; ?></span>

        <p><?php echo gettext("Second_Location"); ?></p>
        <select name="name2">
         <option disabled selected><?php echo _("Select Location"); ?></option>
          <?php require '../controller/Getlocationscontroller.php'; ?>
       </select>

       <span class="error"><?php echo $loc2_error; ?></span>

       <br/>
        <button type="submit" class="pure-button pure-button-primary" name="submit" value="submit"><?php echo gettext("Submit"); ?></button><br/>
      </form>
  </body>
</html>
