<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta name="generator" content="Bluefish 2.2.11" />
  <meta charset="utf-8" />
  <?php
       require_once('../view/include_css.php');
       require('../config/site_config.php');
       require_once("../config/gettextconfig.php");
  ?>

</head>
<body>
  <br />
    <br />
    <form class="pure-form pure-form-stacked" action="<?php echo $site_url; ?>Insertdatacontroller/insertInUsersInfo" method="post">
        <br/>
        press the button to insert json in DB <br/><br/>
        <button type="submit" class="pure-button pure-button-primary" name="json"><?php echo gettext('Submit'); ?></button><br/>
      </p>
    </form>
  </body>
</html>
