<?php

$heading = 'Employee List';

$config = require base_path('config.php');
$db = new Database($config['database']);

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

 if(isset($_POST["delete_by_id"])) {
	 $employeeId = $_POST['delete_by_id'];
	$db->query("delete FROM users where id = $employeeId");
 }


 require view("notes.view.php", ['heading' => 'Employee List',]);
?>