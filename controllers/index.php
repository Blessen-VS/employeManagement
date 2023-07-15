<?php

require base_path('Validator.php');
$config = require base_path('config.php');
$db = new Database($config['database']);




if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

   
    if(!Validator::string($_POST['email']) == 0 || !Validator::string($_POST['password']) == 0){
        $errors['passworderror'] =  'Please enter your username and password to sign in';
    }

    if(empty($errors)){
        

        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $isUserExist = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password' ")->fetchAll();

        $userDetails = $isUserExist;
        
    
        if ($userDetails[0]['role'] == "Manager"){   
            $heading = 'Manager View';

    
            require view("about.view.php", ['heading' => '',]);
        } 
        if ($userDetails[0]['role'] == "Supervisor"){   
            $heading = 'Supervisor View';

    
            require view("index.view.php", ['heading' => '',]);
        } 
    
        else if (!$isUserExist){
    
            echo 'Invalid Credentials';
            die();
        }
    }
}

require view("login.view.php", ['heading' => '',]);
?>