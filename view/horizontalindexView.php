<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta name="generator" content="Bluefish 2.2.11" />
  <meta charset="utf-8" />
  <?php
    require_once("../view/include_css.php");
    require_once("../config/gettextconfig.php");
  ?>
  <title></title>
</head>
<body>
    <div class="pure-menu pure-menu-horizontal">
      <a href="<?php echo $site_url; ?>" class="pure-menu-heading pure-menu-link"><?php echo gettext('Home');?></a>
      <ul class="pure-menu-list">

        <li class="pure-menu-item">
        <a class="pure-menu-link" href="<?php echo $site_url; ?>Showdistancecontroller/get_lat_long_radi">
          <?php echo _('Calculate distance');?></a>
        </li>
          <!--
        <li class="pure-menu-item">
        <a class="pure-menu-link" href="<?php //echo $site_url; ?>filecontroller/getFile">upload Json File</a>
        </li>
        <li class="pure-menu-item">

        <a class="pure-menu-link" href="<?php //echo $site_url; ?>insertdatacontroller/insertInLocations">Insert
        locations</a>
        </li>
        <li class="pure-menu-item">

        <a class="pure-menu-link" href="<?php //echo $site_url; ?>insertdatacontroller/insertInDistance">Insert
        distance</a>
        </li>
      -->
        <li class="pure-menu-item">

        <a class="pure-menu-link" href="<?php echo $site_url; ?>Receiveproblemcontroller/insertInRequests"><?php echo gettext('Enter or upload json data');?></a>
        </li>
        <li class="pure-menu-item">

        <a class="pure-menu-link" href="<?php echo $site_url; ?>Showresultcontroller/result"><?php echo gettext('View Result');?></a>
        </li>

        <li class="pure-menu-item">

        <a class="pure-menu-link" href="<?php echo $site_url; ?>Sessioncontroller/endsession"><?php echo gettext('Logout');?></a>
        </li>
      </ul>
    </div>

    <div class="splash-container" align="center">
      <div class="splash">
        <h1 class="splash-head">Shortest path</h1>
        <p class="splash-subhead"></p>
      </div><br />
</body>
</html>
