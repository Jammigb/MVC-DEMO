<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <style>
  .error {color: #FF00006E;}
  </style>
  <meta name="generator" content="Bluefish 2.2.11" />
  <meta charset="utf-8" />
  <?php
     require('../view/include_css.php');
     require('../config/site_config.php');
     require("../config/gettextconfig.php");
     include '../controller/Uservalidation.php';
     include '../controller/loginassist.php';
  ?>
  <div class="pure-button-group" role="group" align="right">
    <form class="" action="<?php echo $site_url; ?>" method="post">
      <button type="submit" name="lang" class="pure-button" value="en">EN</button>
      <button type="submit" name="lang" class="pure-button" value="bn">BN</button>
    </form>
  </div>
</head>
<body>
  <div align="center">
    <h2>Login</h2>
    <form class="pure-form pure-form-stacked" action="<?php echo $site_url; ?>" method="post">
      <p><?php echo _('User name'); ?></p><input type="text" name="loginUsername" placeholder=<?php echo gettext('UserName'); ?> />
      <span class="error"> <?php echo $user; ?></span>
      <p><?php echo _('Password'); ?></p><input type="password" name="loginpassword" placeholder=<?php echo gettext('Password'); ?> />
      <span class="error"> <?php echo $pass; ?></span><br/>
      <button type="submit" class="pure-button pure-button-primary" name="submit"><?php echo gettext('Submit');?> </button><br/><br/>
      <span class="error"> <?php echo $error; ?></span>
    </form>
  </div>
</body>
</html>
