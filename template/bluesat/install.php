<?php

if (!file_exists('../../config.php')) die('[index.php] config.php not found');
require_once '../../config.php';

// Check if the file is accessed only from a admin if not stop the script from running
if (!JAK_USERID) die('You cannot access this file directly.');

if (!$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die('You cannot access this file directly.');

// Set successfully to zero
$succesfully = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Installation - Mosaic / Template</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../../css/stylesheet.css" type="text/css" media="screen"/>
  <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css" type="text/css" media="screen"/>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Installation - Mosaic / Template</h3>

      <!-- Check if the plugin is already installed -->
      <?php

      $jakdb->query('SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "sitestyle_widget_mosaic"');
      if ($jakdb->affected_rows > 0) { ?>

        <div class="alert alert-info fade in">
          Template is already installed.
        </div>

        <!-- Plugin is not installed let's display the installation script -->
      <?php } else {
        if (isset($_POST['install'])) {

// Delete old entries
          $jakdb->query('DELETE FROM ' . DB_PREFIX . 'setting WHERE product = "mosaic"');

// Insert tables into settings
          $jakdb->query('INSERT INTO ' . DB_PREFIX . 'setting (`varname`, `groupname`, `value`, `defaultvalue`, `optioncode`, `datatype`, `product`) VALUES
("navbarstyle_mosaic_tpl", "mosaic", 0, 0, "yesno", "boolean", "tpl_mosaic"),
("navbarbw_mosaic_tpl", "mosaic", "dark", "dark", "select", "free", "tpl_mosaic"),
("navbarcolor_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("navbarlinkcolor_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("navbarcolorlinkbg_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("navbarcolorsubmenu_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("logo_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),

("mininavbarshow_mosaic_tpl", "mosaic", 1, 0, "yesno", "boolean", "tpl_mosaic"),
("mininavbarcolour_mosaic_tpl", "mosaic", "dark", "dark", "select", "free", "tpl_mosaic"),
("mininavbartxt_mosaic_tpl", "mosaic", "<div class=\"col-sm-12\">
  <a href=\"#\" class=\"first-child\"><i class=\"fa fa-envelope\"></i> Email<span class=\"hidden-sm\">: contact@example.com</span></a>
  <span class=\"phone\">
    <i class=\"fa fa-phone-square\"></i> Tel.: +0 (000) 000-00-00
  </span>
  <a href=\"#\" class=\"pull-right\"><i class=\"fa fa-arrow-circle-down\"></i> Sign Up</a>
  <a href=\"#\" class=\"pull-right\"><i class=\"fa fa-sign-in\"></i> Sign In</a>
  <a href=\"#\" class=\"pull-right\"><i class=\"fa fa-search\"></i> Search</a>
</div>", NULL, "input", "free", "tpl_mosaic"),

("style_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("design_mosaic_tpl", "mosaic", "white", "white", "input", "free", "tpl_mosaic"),
("boxpattern_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("boxbg_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("sidebar_location_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("font_mosaic_tpl", "mosaic", "Robot, Helvetica, sans-serif", "Arial, Helvetica, sans-serif", "input", "free", "tpl_mosaic"),
("fontg_mosaic_tpl", "mosaic", "Oswald", "NonGoogle", "input", "free", "tpl_mosaic"),
("hcolour_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("txtcolour_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),

("theme_mosaic_tpl", "mosaic", "body-green", "body-green", "input", "free", "tpl_mosaic"),
("pattern_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("mainbg_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),

("bcontent1_mosaic_tpl", "mosaic", NULL, NULL, "textarea", "free", "tpl_mosaic"),
("bcontent2_mosaic_tpl", "mosaic", NULL, NULL, "textarea", "free", "tpl_mosaic"),
("bcontent3_mosaic_tpl", "mosaic", NULL, NULL, "textarea", "free", "tpl_mosaic"),
("sectionbg_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("sectiontc_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("sectionshow_mosaic_tpl", "mosaic", 0, 0, "yesno", "boolean", "tpl_mosaic"),

("footer_mosaic_tpl", "mosaic", "dark", "dark", "select", "free", "tpl_mosaic"),
("fcont_mosaic_tpl", "mosaic", "<h3 class=\"text-color\"><span>Go Social</span></h3><div class=\"content social\">
  <p>Stay in touch with us:</p>
  <ul class=\"list-inline\">
      <li><a href=\"#\" class=\"twitter\"><i class=\"fa fa-twitter\"></i></a></li>
    <li><a href=\"#\" class=\"facebook\"><i class=\"fa fa-facebook\"></i></a></li>
    <li><a href=\"#\" class=\"pinterest\"><i class=\"fa fa-pinterest\"></i></a></li>
    <li><a href=\"#\" class=\"github\"><i class=\"fa fa-github\"></i></a></li>
    <li><a href=\"#\" class=\"linkedin\"><i class=\"fa fa-linkedin\"></i></a></li>
    <li><a href=\"#\" class=\"vk\"><i class=\"fa fa-vk\"></i></a></li>
    <li><a href=\"#\" class=\"plus\"><i class=\"fa fa-google-plus\"></i></a></li>
  </ul>
  <div class=\"clearfix\"></div>
</div>", NULL, "input", "free", "tpl_mosaic"),
("fcont2_mosaic_tpl", "mosaic", "<h3 class=\"text-color\"><span>Contacts</span></h3>
<p class=\"contact-us-details\">
	<b>Address:</b> your Address<br/>
	<b>Phone:</b> your Phone<br/>
	<b>Email:</b> your Email
</p>", NULL, "input", "free", "tpl_mosaic"),
("fcont3_mosaic_tpl", "mosaic", "<h3 class=\"text-color\"><span>Navigation</span></h3>", NULL, "input", "free", "tpl_mosaic"),
("footerc_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("footerct_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),
("footercte_mosaic_tpl", "mosaic", NULL, NULL, "input", "free", "tpl_mosaic"),

("styleswitcher_tpl", "mosaic", "1", "1", "yesno", "boolean", "tpl_mosaic"),
("cms_tpl", "mosaic", "1", "1", "yesno", "boolean", "tpl_mosaic"),
("sitestyle_widget_mosaic", "mosaic", 1, 1, "yesno", "boolean", "tpl_mosaic")');

          $succesfully = 1;

          ?>
          <div class="alert alert-success fade in">
            Template successfully installed!
          </div>
        <?php }
        if (!$succesfully) { ?>
          <form name="company" method="post" action="install.php" enctype="multipart/form-data">
            <button type="submit" name="install" class="btn btn-primary btn-block">Install Template</button>
          </form>
        <?php }
      } ?>

    </div>
  </div>

</div>
</body>
</html>