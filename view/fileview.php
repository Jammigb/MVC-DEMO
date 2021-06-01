<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta name="generator" content="Bluefish 2.2.11" />
  <meta charset="utf-8" />
  <?php
    require ("../config/gettextconfig.php");
  ?>
</head>
<body>
  <br />
    <br />
    <form class="pure-form pure-form-stacked"
    action="<?php echo $site_url; ?>Filecontroller/getFile"
    method="post" enctype="multipart/form-data">
        <br/>
        <label><?php echo _('Upload file');?></label><br/>
        <input type="file" name="file"/>
        <button type="submit" class="pure-button pure-button-primary" name="json"><?php echo gettext('Upload'); ?></button><br/>
    </form>
  </body>
</html>
