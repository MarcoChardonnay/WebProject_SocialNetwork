<?php
function isUserLoggedIn(){
    // return !empty($_SESSION['test']);
    return isset($_SESSION['ID_user']);
}
?>