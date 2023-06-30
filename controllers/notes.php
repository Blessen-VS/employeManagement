<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = "Users Listing";

$userList = $db->query("select * from users")->fetchAll();


require("views/notes.view.php");
?>