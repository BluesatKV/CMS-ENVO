<?php

// Error reporting:
error_reporting(E_ALL ^ E_NOTICE);

// The DB connections data
require_once 'include/db.php';

// Do not go any further if install folder still exists
if (is_dir('install')) die('Please delete or rename install folder.');

// Files directory does not exist? abort.
if (!JAK_FILES_DIRECTORY) die('Please define a files directory in the db.php.');

// EN: Start a PHP Session
// CZ: Start PHP Session
session_start();

// -----------------------------------------------------------------------
// DEFINE SEPERATOR ALIASES
// -----------------------------------------------------------------------
define("URL_SEPARATOR", '/');
define("DS", DIRECTORY_SEPARATOR);
define("PS", PATH_SEPARATOR);
define("US", URL_SEPARATOR);

// Absolute Path
define('APP_PATH', dirname(__file__) . DIRECTORY_SEPARATOR);
if (isset($_SERVER['SCRIPT_NAME'])) {
  # on Windows _APP_MAIN_DIR becomes \ and abs url would look something like HTTP_HOST\/restOfUrl, so \ should be trimed too
  $app_main_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
  define('_APP_MAIN_DIR', $app_main_dir);
} else {
  die('[config.php] Cannot determine APP_MAIN_DIR, please set manual and comment this line');
}

// Get the jak DB class
require_once 'class/class.db.php';

// MySQLi connection
$jakdb = new jak_mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
$jakdb->set_charset("utf8");

// EN: Important all Class - files
// CZ: Import všech tříd
include_once 'include/functions.php';
include_once 'class/class.jakbase.php';
include_once 'class/PHPMailerAutoload.php';
include_once 'class/class.userlogin.php';
include_once 'class/class.user.php';
include_once 'class/class.usergroup.php';
include_once 'class/class.plugins.php';
include_once 'class/class.hooks.php';
include_once 'class/class.paginator.php';
include_once 'class/class.tags.php';
include_once 'class/class.resizeimage.php';
include_once 'class/class.debug.php';
include_once 'class/class.htmlelement.php';
// Include the main mPDF library
require 'class/mpdf/vendor/autoload.php';
include_once 'assets/plugins/captcha/simple-php-captcha/simple-php-captcha.php';

// Create instance of HTML_Form from htmlelement.php Class
$Html = new HTML_Element();

// Now launch the rewrite class, depending on the settings in db.
$getURL = New JAK_rewrite($_SERVER['REQUEST_URI']);

// We are not using apache so take the ugly urls
$tempp  = $getURL->jakGetseg(0);
$tempp1 = $getURL->jakGetseg(1);
$tempp2 = $getURL->jakGetseg(2);
$tempp3 = $getURL->jakGetseg(3);
$tempp4 = $getURL->jakGetseg(4);
$tempp5 = $getURL->jakGetseg(5);
$tempp6 = $getURL->jakGetseg(6);

// Call the languages
$lang_files = envo_get_lang_files();

// Get the general settings out the database
$result = $jakdb->query('SELECT varname, value FROM ' . DB_PREFIX . 'setting');
while ($row = $result->fetch_assoc()) {
  // Now check if sting contains html and do something about it!
  if (strlen($row['value']) != strlen(filter_var($row['value'], FILTER_SANITIZE_STRING))) {
    $defvar = htmlspecialchars_decode(htmlspecialchars($row['value']));
  } else {
    $defvar = $row["value"];
  }

  $jkv[$row['varname']] = $defvar;
}

// Get hooks and plugins
$jakhooks   = new JAK_hooks(1);
$jakplugins = new JAK_plugins(1);

// Get the template config file
if (defined(ENVO_TEMPLATE) && !empty(ENVO_TEMPLATE)) include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/config.php';

// timezone from server
date_default_timezone_set($jkv["timezoneserver"]);
$jakdb->query('SET time_zone = "' . date("P") . '"');

// Set the last activity and session into cookies
setcookie('lastactivity', time(), time() + 60 * 60 * 24 * 10, JAK_COOKIE_PATH);
setcookie('usrsession', session_id(), time() + 60 * 60 * 24 * 10, JAK_COOKIE_PATH);

// Standard Language
$site_language = $jkv["lang"];

// Standard Locale
$site_locale = $jkv["locale"] . '.utf8';

// Set lang for TimyMCE Filemanager
if ($site_language == 'en') {
  $managerlang = 'en_EN';
} else {
  $managerlang = 'cs';
}

// Check if user is logged in
$jakuserlogin = new JAK_userlogin();
$jakuserrow   = $jakuserlogin->jakCheckLogged();
if ($jakuserrow) {
  $jakuser = new JAK_user($jakuserrow);
  define('JAK_USERID', $jakuser->getVar("id"));
  // Get the usergroupid out from this user
  $usergroupid = $jakuser->getVar("usergroupid");
  // Get user language
  if ($jakuser->getVar("ulang")) $site_language = strtolower($jakuser->getVar("ulang"));
  // Update last activity from this user
  $jakuserlogin->jakUpdatelastactivity(JAK_USERID);

  // Only the Admin's in the config can have access
  if (JAK_USERID && $jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) {
    define('JAK_ADMINACCESS', TRUE);
    $_SESSION['JAKLoggedInAdmin'] = TRUE;
  } else {
    define('JAK_ADMINACCESS', FALSE);
  }

} else {
  define('JAK_USERID', FALSE);
  define('JAK_ADMINACCESS', FALSE);
  // Standard usergroup id for guests
  $usergroupid = 1;
}

// Let's call the usergroup class
$resultusrg = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'usergroup WHERE id = "' . smartsql($usergroupid) . '" LIMIT 1');
$rowusrg    = $resultusrg->fetch_assoc();

// Get the usergroup class
$jakusergroup = new JAK_usergroup($rowusrg);

// Check if https is activated
if ($jkv["sitehttps"]) {
  define('BASE_URL', 'https://' . FULL_SITE_DOMAIN . _APP_MAIN_DIR . '/');
} else {
  define('BASE_URL', 'http://' . FULL_SITE_DOMAIN . _APP_MAIN_DIR . '/');
}

// Define for template the real request
$realrequest = substr($getURL->jakRealrequest(), 1);
define('JAK_PARSE_REQUEST', $realrequest);
?>