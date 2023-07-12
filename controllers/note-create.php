<?php
require base_path('Validator.php');
$config = require base_path('config.php');
$db = new Database($config['database']);


//$notes = $db->query("select * from notes where id= :id", ['id' => $id])->fetchAll();

 if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    if(!Validator::string($_POST['email'])== 0){
        $errors['email'] = 'Email is invalid';
    }

    if(!Validator::string($_POST['first_name']) == 0){
        $errors['firstname'] = 'First name is required';
    }

    if(!Validator::string($_POST['last_name']) == 0){
        $errors['lastname'] = 'Lastname is required';
    }
    if(!Validator::string($_POST['street_address']) == 0){
        $errors['streetaddress'] = 'Street address is required';
    }
    
    

    if(empty($errors)){

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
 }

require view("note-create.view.php", [
    'heading' => 'Create Employee',
]);
?>

<!-- [
         'first_name'=> $_POST['first_name'],
         'last_name'=> $_POST['last_name'],
         'email'=> $_POST['email'],
         'street_address'=> $_POST['street_address'],
     ] -->