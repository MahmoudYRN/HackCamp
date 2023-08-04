<?php
require_once('Models/userData.php');
require_once('Models/userDataSet.php');


$view = new stdClass();
$view->pageTitle = 'Login';

$userData = new userDataSet();

$view->dbMessage ="";
$view->loginError = false;

session_start();

//var_dump($_SESSION);

if (isset($_POST["loginbutton"])) {
    //var_dump($_POST);
    //retreive users
    $userDataSet = new userDataSet();

    $result = $userDataSet->loginUser($_POST["username"],$_POST["password"]);

    if($result) //if match
    {
        echo '<h1 id>You are logged in</h1>';
        $_SESSION["login"] = ($_POST["username"]);
        header("Location: home.php");
    }
    else{
        echo "Error in username and password";
    }

    //$userID = $_SESSION["login"];


}

if (isset($_POST["logoutbutton"]))
{
    header("Location: index.php");
    echo "logout user";
    unset($_SESSION["login"]);
    session_destroy();
}
