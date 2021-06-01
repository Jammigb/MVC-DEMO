<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta name="generator" content="Bluefish 2.2.11" />
  <meta charset="utf-8" />
  <?php
      require_once('../view/include_css.php');
      require '../config/site_config.php';
      require_once("../config/gettextconfig.php");
    ?>
  <title></title>
</head>
<body>
    <form class="pure-form pure-form-stacked" action="<?php echo $site_url; ?>Showresultcontroller/result" method="post">
      <fieldset>
        <legend>Result</legend> <label for="rid">Enter</label> <input type=
        "text" id="rid" name="rid" placeholder="reference id" />
      </fieldset><button type="submit" class=
      "pure-button pure-button-primary" name="submit" value="submit"><?php echo gettext('Submit'); ?></button>
    </form>
  </body>
</html>
