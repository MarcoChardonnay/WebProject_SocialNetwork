<?php
require_once('dbinit.php');

//redirect to home page if user is logged in
if (isUserLoggedIn()) {
    header("Location: home.php");
}

//if login form is submitted
if (isset($_POST['loginInput']) && isset($_POST['password'])) {
    $IDuser = 0;    //initialize IDuser to 0 as ID autoincrement starts from 1
    //save variables
    $logInput = $_POST['loginInput'];
    $password = $_POST['password'];

    if (isEmail($logInput)) {
        //input is an email
        //check if email is in db
        $IDuser = $dbHelper->getIDuserbyEmail($logInput);
        if ($IDuser == -1) {
            //user not found in db
            $templateParams["loginerror"] = "The user does not exist; the email " . $logInput . " is not registered";
        }
    }
    if (isUsername($logInput)) {
        //input is a username
        //check if username is in db
        $IDuser = $dbHelper->getIDuserbyUsername($logInput);
        if ($IDuser == -1) {
            //user not found in db
            $templateParams["loginerror"] = "The user does not exist; the username " . $logInput . " is not registered";
        }
    }
    //if IDuser is not -1 and if IDuser is set, then the user exists in the db and we can check the password
    if ($IDuser != -1 && !empty($IDuser)) {     //From the manual: 0 as an integer is considered empty
        if ($dbHelper->checkPassword($IDuser, $password)) {
            //login successful
            registerLoggedUser($IDuser);
            header("Location: home.php");
        } else {
            //login failed
            $templateParams["loginerror"] = "The password is wrong";
        }
    }
    if (empty($IDuser)) {
        //the input is neither an email nor a username
        $templateParams["loginerror"] = "The input is neither an email nor a username";
    }
}

// Base params
$templateParams['title'] = 'Login';
$templateParams['fileName'] = 'login_form.php';
$templateParams['navbar'] = false;
//$templateParams['scriptFileName'] = '';

require_once ('template/base.php');
