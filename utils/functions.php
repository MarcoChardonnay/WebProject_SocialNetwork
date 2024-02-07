<?php
function isUserLoggedIn(){
    return isset($_SESSION['ID_user']);
}

function registerLoggedUser(int $IDuser){
    $_SESSION['ID_user'] = $IDuser;
}

function isEmail($input) {
    return filter_var($input, FILTER_VALIDATE_EMAIL);
}

function isUsername($input) {
    // Define a pattern for usernames (alphanumeric characters and underscores)
    $pattern = '/^[a-zA-Z0-9_]+$/';
    return preg_match($pattern, $input);
}

//! NOT TESTED
function isPassword($input) {
    // Define a pattern for passwords (alphanumeric characters, underscores, and special characters)
    $pattern = '/^[a-zA-Z0-9_!@#$%^&*()]+$/';
    return preg_match($pattern, $input);
}

?>