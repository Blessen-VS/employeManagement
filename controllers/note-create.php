<?php
$config = require('config.php');
$db = new Database($config['database']);
$heading = "Create Employee";


//$notes = $db->query("select * from notes where id= :id", ['id' => $id])->fetchAll();

 if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST['email'];

    $isUserExist = $db->query("SELECT email FROM users WHERE email='$email'");
    

    if ($isUserExist->rowCount() == 0 ){    

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $streetaddress = $_POST['street_address'];
    $role = $_POST['role']; 
    
     $db->query("insert into users (first_name, last_name, email, street_address, role) values('$firstname', '$lastname', '$email', '$streetaddress', '$role')",);
    }

    else{
        echo ("User already exist please add a different user");
        die();
    }
 }

require("views/note-create.view.php");
?>

<!-- [
         'first_name'=> $_POST['first_name'],
         'last_name'=> $_POST['last_name'],
         'email'=> $_POST['email'],
         'street_address'=> $_POST['street_address'],
     ] -->