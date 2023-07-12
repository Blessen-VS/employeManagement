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
    
        $isUserExist = $db->query("SELECT email FROM users WHERE email='$email'");
        
    
        if ($isUserExist->rowCount() != 0 ){   
            $heading = 'Home';
    
            require view("index.view.php", ['heading' => '',]);
        } 
    
        else if ($isUserExist->rowCount() == 0 ){
    
            $errors['loginerror'] =  'Invalid Credentials';
            die();
        }
    }
}

require view("login.view.php", ['heading' => '',]);
?>