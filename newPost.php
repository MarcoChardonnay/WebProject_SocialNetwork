<?php
require_once('dbinit.php');

//if new post form is submitted
if (isset($_POST['descrtext'])) {
    //save variable
    $description = trim($_POST['descrtext']);
    $IDuser = $_SESSION['ID_user'];
    if (strlen($description) < 1500) {
    //insert post in db
    if($dbHelper->insertPost($IDuser, $description)){
        //post successful
        $templateParams["postsuccess"] = "The post added successfully";
        //reload page
        header("refresh:2;url=newPost.php");
    }else{
        //post failed
        $templateParams["posterror"] = "The post failed";
    }
    } else {
        $templateParams["posterror"] = "The description is too long";
    }
}

//base params
$templateParams['title'] = 'Calliope - New Post';
$templateParams['fileName'] = 'newPost_form.php';
$templateParams['navbar'] = true;
$templateParams['jsFile'] = array('countChars.js');

require_once('template/base.php');

?>