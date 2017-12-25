<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/update.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

// Check if the file is accessed only from a admin if not stop the script from running
$php_errormsg  = 'To edit the file, you must be logged in as an ADMINISTRATOR !!! You cannot access this file directly.';
$php_errormsg1 = 'Only ADMINISTRATOR privileges allow you to edit the file !!! You cannot access this file directly.';
if (!ENVO_USERID) die($php_errormsg);

if (!$envouser->envoAdminAccess($envouser->getVar("usergroupid"))) die($php_errormsg1);

// Set successfully to zero
$succesfully = 0;

// PLUGIN CONFIG
// New plugin version after update
$pluginversion = '1.1';
$nameofplugin  = 'Intranet';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update - Intranet Plugin</title>
  <meta charset="utf-8">
  <!-- BEGIN Vendor CSS-->
  <link href="/admin/assets/plugins/bootstrapv3/css/bootstrap.min.css?=v3.3.4" rel="stylesheet" type="text/css"/>
  <link href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
  <!-- BEGIN Pages CSS-->
  <link href="/admin/pages/css/pages-icons.css?=v2.2.0" rel="stylesheet" type="text/css">
  <link class="main-stylesheet" href="/admin/pages/css/pages.css?=v2.2.0" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12 m-t-20">
      <div class="jumbotron bg-master">
        <h3 class="semi-bold text-white">Update - Intranet Plugin</h3>
      </div>
      <hr>
      <div class="m-b-30">
        <h4 class="semi-bold">Intranet Plugin - info about update to version <?php echo $pluginversion; ?></h4>

      </div>
      <hr>

      <!-- Check if the plugin is already installed -->
      <?php $envodb->query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "' . $nameofplugin . '"');
      if ($envodb->affected_rows == 0) {
        $succesfully = 1; ?>

        <div class="alert bg-danger text-white">Plugin is not installed!!!</div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else { ?>

        <?php $result = $envodb->query('SELECT id, pluginversion FROM ' . DB_PREFIX . 'plugins WHERE name = "' . $nameofplugin . '"');
        $row          = $result->fetch_assoc();
        if ($row['pluginversion'] == $pluginversion) {
          $succesfully = 1;
          $envodb->query('UPDATE ' . DB_PREFIX . 'plugins SET time = NOW() WHERE name = "' . $nameofplugin . '"'); ?>

          <div class="alert bg-info text-white">Plugin is already up to date!</div>

          <!-- Plugin is not installed let's display the installation script -->
        <?php } else { ?>

          <!-- The installation button is hit -->
          <?php if (isset($_POST['install'])) {

            // --------------------------------------------
            //  START PLUGIN UPDATE PROCESS
            // --------------------------------------------





            // --------------------------------------------
            //  END PLUGIN UPDATE PROCESS
            // --------------------------------------------

            $envodb->query('UPDATE ' . DB_PREFIX . 'plugins SET pluginversion = "' . $pluginversion . '", time = NOW() WHERE name = "' . $nameofplugin . '"');

            $succesfully = 1;

            ?>

            <div class="alert bg-success text-white">Plugin updated successfully</div>
            <button id="closeModal" class="btn btn-default btn-block" onclick="window.parent.closeModal();">Zavřít</button>

          <?php }
        } ?>

        <?php if (!$succesfully) { ?>
          <form name="company" method="post" action="update.php" enctype="multipart/form-data">
            <button type="submit" name="install" class="btn btn-complete btn-block">Update Plugin</button>
          </form>
        <?php }
      } ?>

    </div>
  </div>

</div><!-- #container -->
</body>
</html>