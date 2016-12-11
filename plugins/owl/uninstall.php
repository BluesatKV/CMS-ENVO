<?php

// Include the config file...
if (!file_exists('../../config.php')) die('[install.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
if (!JAK_USERID) die('You cannot access this file directly.');

if (!$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die('You cannot access this file directly.');

// Set successfully to zero
$succesfully = 0;

// Set language for plugin
if ($jkv["lang"] != $site_language && file_exists(APP_PATH.'admin/lang/'.$site_language.'.ini')) {
  $tl = parse_ini_file(APP_PATH.'admin/lang/'.$site_language.'.ini', true);
} else {
  $tl = parse_ini_file(APP_PATH.'admin/lang/'.$jkv["lang"].'.ini', true);
  $site_language = $jkv["lang"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Uninstallation - Pull Feedback Messages</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/stylesheet.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="/admin/css/admin-color.css?=<?php echo $jkv["updatetime"]; ?>" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="well">
        <h3>Installation - Pull Feedback Messages</h3>
      </div>
      <hr>
      <div class="margin-bottom-30">
        <h4>Pull Feedback Messages Plugin - Info about uninstallation</h4>
      </div>

      <!-- Let's do the uninstall -->
      <?php if (isset($_POST['uninstall'])) {
// Validate
      session_start();
      if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]) {

// Now get the plugin id for futher use
        $rows = $jakdb->queryRow('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Owl"');

        if ($rows) {

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'plugins WHERE name = "Owl"');
          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pluginhooks WHERE product = "owl"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = "' . smartsql($rows['id']) . '"');
          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'pagesgrid WHERE pluginid = "' . smartsql($rows['id']) . '"');

          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "owl"');

          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'pages DROP showowl');
          $jakdb->query('ALTER TABLE ' . DB_PREFIX . 'news DROP showowl');

        }

        $succesfully = 1;

        ?>

        <div class="alert bg-success"><?php echo $tl["plugin"]["p15"];?></div>

      <?php } else { ?>
        <div>
          <h4 class="text-danger-400">Wrong Code Entered - Please, enter right number !</h4>
        </div>
      <?php }}
      if (!$succesfully) { ?>
        <hr>
        <form name="company" action="uninstall.php" method="post" enctype="multipart/form-data">
          <div class="form-group form-inline">
            <label for="text">Please read info about uninstallation and enter text: </label>
            <input type="text" name="captcha" class="form-control" id="text">
            <img src="../captcha.php" />
          </div>
          <button type="submit" name="uninstall" class="btn btn-danger btn-block"><?php echo $tl["plugin"]["p11"];?></button>
        </form>
      <?php } ?>

    </div>
  </div>

</div><!-- #container -->
</body>
</html>