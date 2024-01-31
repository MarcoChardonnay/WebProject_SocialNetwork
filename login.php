<?php
require_once("bootstrap.php");

//redirect to home page if user is logged in
if(isUserLoggedIn()){
    header("Location: home.php");
}

//if login form is submitted
if(isset($_POST['username']) && isset($_POST['password'])){
    //save variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    //check if user exists
    $IDuser = $dbHelper->getIDuserbyUsername($username);
    if($IDuser == -1){
        $templateParams["loginerror"] = "The user does not exist";
    }
    //check if password is correct
    else if($dbHelper->checkPassword($IDuser, $password)){
        //login successful
        registerLoggedUser($IDuser);
        header("Location: home.php");
    }
    else{
        //login failed
        $templateParams["loginerror"] = "The password is wrong";
    }
}

// Base params
$templateParams['title'] = 'Login';
$templateParams['fileName'] = 'login_form.php';
//$templateParams['scriptFileName'] = '';

require_once 'template/base.php';

?>