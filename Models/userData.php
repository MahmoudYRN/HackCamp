<?php

class userData {

    protected $_id, $_username, $_name, $_email, $_password;

    public function __construct($dbRow) {
        $this->_id = $dbRow['id'];
        $this->_username = $dbRow['username'];
        $this->_name = $dbRow['name'];
        $this->_email = $dbRow['email'];
        $this->_password = $dbRow['password'];
    }

    public function getUserID() {
        return $this->_id;
    }

    public function getUsername() {
        return $this->_username;
    }

    public function getName() {
        return $this->_name;
    }

    public function getEmail() {
        return $this->_email;
    }

}


