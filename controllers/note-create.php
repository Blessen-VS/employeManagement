<?php
$config = require('config.php');
$db = new Database($config['database']);
$heading = "Create Employee";


//$notes = $db->query("select * from notes where id= :id", ['id' => $id])->fetchAll();

 if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $streetaddress = $_POST['street_address'];
    

     $db->query("insert into users (first_name, last_name, email, street_address) values('$firstname', '$lastname', '$email', '$streetaddress')",);
     
 }

require("views/note-create.view.php");
?>

<!-- [
         'first_name'=> $_POST['first_name'],
         'last_name'=> $_POST['last_name'],
         'email'=> $_POST['email'],
         'street_address'=> $_POST['street_address'],
     ] -->