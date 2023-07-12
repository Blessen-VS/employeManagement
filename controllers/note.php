<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$heading = "Note";
$id = $_GET['id'];
dd($id);
$notes = $db->query("select * from notes where id= :id", ['id' => $id])->fetchAll();



require view("note.view.php", ['heading' => 'Note']);
?>