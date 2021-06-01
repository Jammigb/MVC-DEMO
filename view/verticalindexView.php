<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta name="generator" content="Bluefish 2.2.11" />
  <meta charset="utf-8" />
  <?php
    require_once("../view/include_css.php");
    include("../config/gettextconfig.php");
  ?>
  <title></title>
</head>
<body>
  <div class="pure-button-group" role="group" align="right">
    <form class="" action="<?php echo $site_url; ?>" method="post">
      <button type="submit" name="lang" class="pure-button" value="en">EN</button>
      <button type="submit" name="lang" class="pure-button" value="bn">BN</button>
    </form>
  </div>
  <div class="splash-container" align="center">
    <div class="splash">
      <h1 class="splash-head">Shortest path</h1>
      <p class="splash-subhead"></p>
    </div><br />
    <a class="pure-button pure-button-primary" href="<?php echo $site_url; ?>Showdistancecontroller/get_lat_long_radi">
      <?php echo gettext('Calculate distance');?></a>
    <br/><br/>
    <!--
    <a class="pure-button pure-button-primary" href="<?php //echo $site_url; ?>filecontroller/getFile">upload Json File</a>
    <br/><br/>
    <!
    <a class="pure-button pure-button-primary" href="<?php //echo $site_url; ?>insertdatacontroller/insertInLocations">Insert
    locations</a>
    <br/><br/>
    <a class="pure-button pure-button-primary" href="<?php //echo $site_url; ?>insertdatacontroller/insertInDistance">Insert
    distance</a>
    <br/><br/> -->
    <a class="pure-button pure-button-primary" href="<?php echo $site_url; ?>Receiveproblemcontroller/insertInRequests"><?php echo gettext('Enter or upload json data');?></a>
    <br/><br/>
    <a class="pure-button pure-button-primary" href="<?php echo $site_url; ?>Showresultcontroller/result"><?php echo gettext('View Result');?></a>
    <br/><br/>
    <a class="pure-button pure-button-primary" href="<?php echo $site_url; ?>Sessioncontroller/endsession"><?php echo gettext('Logout');?></a>
    <br/><br/>
  </body>
</html>
