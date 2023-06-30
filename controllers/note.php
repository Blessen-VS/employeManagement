<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Note";
$id = $_GET['id'];
dd($id);
$notes = $db->query("select * from notes where id= :id", ['id' => $id])->fetchAll();



require("views/note.view.php");
?>