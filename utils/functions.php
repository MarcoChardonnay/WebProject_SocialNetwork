<?php
function isUserLoggedIn(){
    return isset($_SESSION['ID_user']);
}

function registerLoggedUser(int $IDuser){
    $_SESSION['ID_user'] = $IDuser;
}

function logout(){
    if(session_destroy()){
        return true;
    } else {
        return false;
    }
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

function timeAgo($datetime) {
    $now = new DateTime();
    $posted = new DateTime($datetime);
    $diff = $now->diff($posted);

    if ($diff->y > 0) {
        return $diff->y . 'y ago';
    } elseif ($diff->m > 0) {
        return $diff->m . 'm ago';
    } elseif ($diff->d > 0) {
        return $diff->d . 'd ago';
    } elseif ($diff->h > 0) {
        return $diff->h . 'h ago';
    } elseif ($diff->i > 0) {
        return $diff->i . 'min ago';
    } else {
        return 'just now';
    }
}

// Example usage
//echo timeAgo('2024-06-27 08:00:00');


?>