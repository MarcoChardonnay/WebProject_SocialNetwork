<?php
require_once('dbinit.php');

//redirect to home page if user is logged in
if (isUserLoggedIn()) {
    header("Location: home.php");
}
?>