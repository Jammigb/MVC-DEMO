<?php
  require '../config/site_config.php';
  require_once("../config/gettextconfig.php");

  echo "<br />";
  echo gettext("File is not ready for reference id");
  echo ": $rid</p><br />";

  ?>
  <a class="pure-button pure-button-primary" href="<?php echo $site_url; ?>Lp/triggrelp" ><?php echo gettext("Trigger calculation"); ?></a>
