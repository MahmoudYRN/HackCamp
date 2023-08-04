<?php

class papersData {

    protected $_idpapers, $_paperName, $_papersDate, $_userID;

    public function __construct($dbRow) {
        $this->_idpapers = $dbRow['idpapers'];
        $this->_paperName = $dbRow['paperName'];
        $this->_papersDate = $dbRow['papersDate'];
        $this->_userID = $dbRow['userID'];

    }


    public function getpapersID() {
        return $this->_idpapers;
    }

    public function getPaperName() {
        return $this->_paperName;
    }

    public function getPapersDate() {
        return $this->_papersDate;
    }

    public function getuserID() {
        return $this->_userID;
    }
}


