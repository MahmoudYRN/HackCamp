<?php
require_once ('Models/Database.php');
require_once ('Models/userData.php');

class userDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();

    }

    public function fetchAllUsers() {
        $sqlQuery = 'SELECT * FROM users';
// prepare a PDO statement
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute(); // execute the PDO statement
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new userData($row);
        }
        return $dataSet;
    }

    public function fetchSomeUsers($searchText) {
        $sqlQuery = "SELECT * FROM users WHERE username ='$searchText'";
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute(); // execute the PDO statement
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new userData($row);
        }
        return $dataSet;
    }

    public function loginUser($username, $password) {
        $sqlQuery = 'SELECT * FROM users WHERE username=? AND password=?';
        $statement = $this->_dbHandle->prepare($sqlQuery);

        $statement->bindParam(1, $username);
        $statement->bindParam(2, $password);

        $statement->execute(); // execute the PDO statement
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new userData($row);
        }
        return $dataSet;
    }
    public function registerUser($username, $name, $email, $password) {

        $sqlQuery = 'INSERT INTO users (username, name, email, password)VALUES(?,?,?,?)';
        $statement = $this->_dbHandle->prepare($sqlQuery);

        $statement->bindParam(1, $username);
        $statement->bindParam(2, $name);
        $statement->bindParam(3, $email);
        $statement->bindParam(4, $password);

        return $statement->execute();
    }

    public function fetchAllFriends() {

        $sqlQuery = 'SELECT * FROM friends AS F , users AS U WHERE CASE WHEN F.friend1 = 3 THEN F.friend2 = U.id WHEN
        F.friend2 = 3 THEN F.friend1 = U.id END AND F.status = 3;';
        // prepare a PDO statement
        $statement = $this->_dbHandle->prepare($sqlQuery);
        $statement->execute(); // execute the PDO statement
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new friendsData($row);
        }
        return $dataSet;
    }

}