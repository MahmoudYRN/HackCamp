<?php
require_once ('Models/Database.php');
require_once ('Models/papersData.php');

class papersDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function uploadPaper($paperName, $papersDate, $userID) {

        $sqlQuery = "INSERT INTO papers (paperName, papersDate, userID)VALUES(?,?,(SELECT id FROM users WHERE username = '$userID'))";
        $statement = $this->_dbHandle->prepare($sqlQuery);

        $statement->bindParam(1, $paperName);
        $statement->bindParam(2, $papersDate);

        return $statement->execute();
    }

    public function getPaper($userID)
    {
        $sqlQuery = "SELECT * FROM papers WHERE userID = (SELECT id FROM users WHERE username = '$userID')";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new papersData($row);
        }
        return $dataSet;
    }


    public function getPapers()
    {
        $sqlQuery = 'SELECT * FROM papers';
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute();
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new papersData($row);
        }
        return $dataSet;
    }

}