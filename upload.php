<?php
require_once("logincontroller.php");
require_once("Models/papersData.php");
require_once("Models/papersDataSet.php");
require_once("Models/userData.php");
require_once("Models/userDataSet.php");

$view = new stdClass();
$view->pageTitle = 'Upload';

if ( isset( $_FILES['pdfFile'] ) ) {
    if ($_FILES['pdfFile']['type'] == "application/pdf") {
        $source_file = $_FILES['pdfFile']['tmp_name'];
        $dest_file = "uploads/".$_FILES['pdfFile']['name'];

        if (file_exists($dest_file)) {
            print "The file name already exists!!";
        }
        else {
            move_uploaded_file( $source_file, $dest_file )
            or die ("Error!!");
            if($_FILES['pdfFile']['error'] == 0) {

            }
        }
    }
    else {
        if ( $_FILES['pdfFile']['type'] != "application/pdf") {
            print "Error occured while uploading file : ".$_FILES['pdfFile']['name']."<br/>";
            print "Invalid  file extension, should be pdf !!"."<br/>";
            print "Error Code : ".$_FILES['pdfFile']['error']."<br/>";
        }
    }
    $papersData = new papersDataSet();
    $papersDataSet = new papersDataSet();


    $paper_name = $_FILES['pdfFile']['name'];
    $papersDate = date("Y/m/d");

    $userID = $_SESSION["login"];

    $papersDataSet->uploadPaper($paper_name, $papersDate, $userID);

}

require_once('Views/upload.phtml');
