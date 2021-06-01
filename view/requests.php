<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta name="generator" content="Bluefish 2.2.11" />
  <meta charset="utf-8" />
  <style>
  .error {color: #FF00006E;}
  </style>
  <?php
       require_once('../view/include_css.php');
       require '../config/site_config.php';
       require ("../config/gettextconfig.php");
       include '../controller/requestsassist.php';
  ?>
  <style type="text/css">
  #jsdat {height:150px;width:50%;color:blue;font-size:14px;}
  </style>
</head>
<body>

    <form class="pure-form pure-form-stacked" action="<?php echo $site_url; ?>Receiveproblemcontroller/insertInRequests" method="post">
      <fieldset>
        <legend>Data</legend> <label for="jsdat"><?php  echo gettext('Input JSON'); ?></label>
        <textarea class="pure-input-1 c1" name="jsdat" id="jsdat" placeholder=
        "Input JSON">[
    {"name": "B"},
    {"name": "D"},
    {"name": "E"},
    {"name": "G"}
]
    </textarea><br/>
    <span class="error"> <?php echo $error; ?><br/></span><br/>
        <button type="submit" class="pure-button pure-button-primary" name=
        "submit" value="submit"><?php echo gettext('Submit'); ?></button>
      </fieldset>
    </form> <br/>

    <h3>OR</h3>

    <form class="pure-form pure-form-stacked"
    action="<?php echo $site_url; ?>Filecontroller/getFile"
    method="post" enctype="multipart/form-data">
        <br/>
        <label><?php echo _('Upload file'); ?></label><br/>
        <input type="file" name="file"/>
        <button type="submit" class="pure-button pure-button-primary" name="json"><?php echo _('Upload'); ?></button><br/>
    </form>

  </body>
  </html>
