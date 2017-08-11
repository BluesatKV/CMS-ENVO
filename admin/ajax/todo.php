<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/todo.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

//
require "../../class/class.todo.php";

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die("Nothing to see here");

if (isset($_GET['id'])) $id = (int)$_GET['id'];

try {

	switch($_GET['action']) {
		case 'delete':
			Jak_ToDo::delete($id);
			break;
			
		case 'rearrange':
			Jak_ToDo::rearrange($_GET['positions']);
			break;
			
		case 'edit':
			Jak_ToDo::edit($id,$_GET['text']);
			break;
			
		case 'done':
			Jak_ToDo::done($id);
			break;
			
		case 'admin':
			Jak_ToDo::done($id);
			break;
			
		case 'new':
			Jak_ToDo::createNew($_GET['text']);
			break;
	}

}
catch(Exception $e){
//	echo $e->getMessage();
	die("0");
}
die("1");
?>