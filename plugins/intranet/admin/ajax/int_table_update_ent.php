<?php
// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_update_ent.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Set the JSON header content-type
// CZ: Nastavení záhlaví JSON
header('Content-Type: application/json;charset=utf-8');

// CHECK REQUEST METHOD
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $input = filter_input_array(INPUT_POST);
} else {
  $input = filter_input_array(INPUT_GET);
}

// PHP CODE and DB
//-------------------------

// Define basic variable
$data_array = array();

if ($input['action'] === 'edit') {
  // ACTION - EDIT

  $jakdb->query('UPDATE ' . DB_PREFIX . 'intranethouseent SET entrance = "' . $input['entrance'] . '", countapartment = "' . $input['countapartment'] . '", countetage = "' . $input['countetage'] . '", elevator = "' . $input['elevator'] . '" WHERE id = "' . $input['id'] . '"');

  $envodata = $input;

} else if ($input['action'] === 'delete') {
  // ACTION - DELETE

  //
  $result = $jakdb->query('SELECT entrance FROM ' . DB_PREFIX . 'intranethouseent WHERE id = "' . $input['id'] . '"');
  $row    = $result->fetch_assoc();

  $result = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'intranethouseapt WHERE entrance = "' . $row['entrance'] . '"');
  // Determine number of rows result set
  $row_cnt = $result->num_rows;

  if ($row_cnt > 0) {
    $data_array[] = array(
      'id'     => $input["id"]
    );

    // Data for JSON
    $envodata = array(
      'status'     => 'delete_error_E01',
      'status_msg' => 'Deleting the record from DB was incorrect',
      'data'       => $data_array
    );
  } else {
    $result = $jakdb->query('DELETE FROM ' . DB_PREFIX . 'intranethouseent WHERE id = "' . $input['id'] . '"');

    if ($result) {
      $data_array[] = array(
        'id'     => $input["id"],
        'action' => $input["action"],
      );

      // Data for JSON
      $envodata = array(
        'status'     => 'delete_success',
        'status_msg' => 'Deleting the record from DB was successful, the page will be refreshed',
        'data'       => $data_array
      );
    } else {
      $data_array[] = array(
        'id'     => $input["id"]
      );

      // Data for JSON
      $envodata = array(
        'status'     => 'delete_error_E02',
        'status_msg' => 'Deleting the record from DB was incorrect',
        'data'       => $data_array
      );
    }
  }

} else if ($input['action'] === 'restore') {
  // ACTION - RESTORE

  $envodata = $input;
}

// RETURN JSON OUTPUT
//-------------------------
$json_output = json_encode($envodata);
echo $json_output;

?>