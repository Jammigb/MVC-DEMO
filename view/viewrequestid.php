<?php
  include '../view/include_css.php';
  require '../config/site_config.php';

  echo "<br/><br/>Request received. Reference id: ".$request_id;
  echo "<br/><br/>";
  ?>
  <a class="pure-button pure-button-primary" href="<?php echo $site_url; ?>Receiveproblemcontroller/createComb/<?php echo $request_id; ?>" >Generate problem file</a>
