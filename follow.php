<?php
require_once('dbinit.php');
//check if $_POST is set
if (!isset($_POST['ID_user']) || !isset($_POST['following'])) {
    header("Location: search.php");
    exit;
}

$dbHelper->toggleFollow($_SESSION['ID_user'], $_POST['ID_user'], $_POST['following']);
header("Location: search.php");
exit;
?>