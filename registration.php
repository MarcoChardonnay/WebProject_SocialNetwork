<?php
require_once("bootstrap.php");

//redirect to home page if user is logged in
if(isUserLoggedIn()){
    header("Location: home.php");
}

//if registration form is submitted
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmpass']) && isset($_POST['email'])){
    //save variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['confirmpass'];
    $email = $_POST['email'];
    if(isset($_POST['notification'])){
        $notification = $_POST['notification'];
    }
    else{
        $notification = 0;
    }
    if(isset($_POST['profile_picture'])){
        //profile picture
        $profile_picture = "default.jpg";
    }
    else{
        $profile_picture = "default.jpg";
    }
    //check if user exists
    $IDuser = $dbHelper->getIDuserbyUsername($username);
    if($IDuser != -1){    //username found
        $templateParams["registrationerror"] = "The user already exists";
    }
    //check if passwords match
    else if($password != $password2){
        $templateParams["registrationerror"] = "The passwords do not match";
    }
    else{
        //register user
        if($dbHelper->registerUser($username, $password, $email, $notification, $profile_picture)){
            //registration successful
            $templateParams["registrationsuccess"] = "The registration was successful, you will be redirected to the login page in 5 seconds. If not, click <a href='login.php'>here</a>";
            header("refresh:5;url=login.php");
        }
        else{
            //registration failed
            $templateParams["registrationerror"] = "The registration process failed";
        }
    }
}

// Base params
$templateParams['title'] = 'Registration';
$templateParams['fileName'] = 'registration_form.php';
//$templateParams['scriptFileName'] = '';

require_once 'template/base.php';

?>