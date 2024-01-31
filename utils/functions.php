<?php
function isUserLoggedIn(){
    // return !empty($_SESSION['test']);
    return isset($_SESSION['ID_user']);
}

function registerLoggedUser(int $IDuser){
    $_SESSION['ID_user'] = $IDuser;
}

?>