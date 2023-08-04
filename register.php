<?php
require_once('Models/userData.php');
require_once('Models/userDataSet.php');
require_once("logincontroller.php");
$view = new stdClass();
$view->pageTitle = 'Register user';

$userData = new userDataSet();

$view->dbMessage ="";
$view->loginError = false;


if(isset($_POST["registerbutton"])){
    //var_dump($_POST);
    //register user

    $userDataSet = new userDataSet();

    $userDataSet->registerUser($_POST["username"],$_POST["name"],$_POST["email"],$_POST["password"]);

    echo '<h1>You are registered</h1>';

    header("Location: index.php");
    exit();
    //redirects user to main page after sign up
}

require_once('Views/register.phtml');
