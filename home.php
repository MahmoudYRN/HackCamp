<?php
require_once("logincontroller.php");
require_once("Models/papersData.php");
require_once("Models/papersDataSet.php");
require_once("Models/userData.php");
require_once("Models/userDataSet.php");

$view = new stdClass();
$view->pageTitle = 'Home';

$papersDataSet = new papersDataSet();


$result = $papersDataSet->getPapers();

$userID = $_SESSION["login"];
$result1 = $papersDataSet->getPaper($userID);


$userDataSet = new userDataSet();

$userPhotos = $userDataSet->fetchSomeUsers($userID);



require_once('Views/home.phtml');
