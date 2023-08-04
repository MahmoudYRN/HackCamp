<?php
require_once("logincontroller.php");
require_once("Models/papersData.php");
require_once("Models/papersDataSet.php");
require_once("Models/userData.php");
require_once("Models/userDataSet.php");
$view = new stdClass();
//$view->pageTitle = 'Viewer';


require_once('Views/preview.phtml');
