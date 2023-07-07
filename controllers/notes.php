<?php



$config = require('config.php');
$db = new Database($config['database']);

$heading = "Users Listing";

$userList = $db->query("select * from users")->fetchAll();




if(isset($_POST["export_data"])) {	
 	$filename = "user2_data_export_".date('Ymd') . ".xls";			
 	header("Content-Type: application/vnd.ms-excel");
 	header("Content-Disposition: attachment; filename=\"$filename\"");	
 	$show_coloumn = false;
 	if(!empty($userList)) {
 	  foreach($userList as $record) {
 		if(!$show_coloumn) {
 		  // display field/column names in first row
 		  echo implode("\t", array_keys($record)) . "\n";
 		  $show_coloumn = true;
 		}
 		echo implode("\t", array_values($record)) . "\n";
 	  }
 	}
 	exit;  
 }


require("views/notes.view.php");
?>