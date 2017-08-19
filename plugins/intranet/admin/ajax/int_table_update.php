<?php
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/select.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// CHECK REQUEST METHOD
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $input = filter_input_array(INPUT_POST);
} else {
  $input = filter_input_array(INPUT_GET);
}

// PHP QUESTION TO MYSQL DB
if ($input['action'] === 'edit') {

  $jakdb->query('UPDATE ' . DB_PREFIX . 'intranethousedetail SET numberentrance = "' . $input['numberentrance'] . '", countapartment = "' . $input['countapartment'] . '", countetage = "' . $input['countetage'] . '", elevator = "' . $input['elevator'] . '" WHERE id = "' . $input['id'] . '"');

  $envodata = json_encode($input);

} else if ($input['action'] === 'delete') {

  $jakdb->query('DELETE FROM ' . DB_PREFIX . 'intranethousedetail WHERE id = "' . $input['id'] . '"');

  $envodata = json_encode($input);

} else if ($input['action'] === 'restore') {

  $jakdb->query('INSERT ' . DB_PREFIX . 'intranethousedetail SET numberentrance = "' . $input['numberentrance'] . '", countapartment = "' . $input['countapartment'] . '", countetage = "' . $input['countetage'] . '", elevator = "' . $input['elevator'] . '"');

}

// RETURN OUTPUT
echo $envodata;

?>