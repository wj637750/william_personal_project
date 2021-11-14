<?php

class User {

    private $userID, $firstName, $lastName, $email, $userName, $password, $acctype;

    public function __construct($userID, $firstName, $lastName, $email, $userName, $password, $acctype) {
        $this->userID = $userID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->userName = $userName;
        $this->password = $password;
        $this->acctype = $acctype;
    }
    
    public function getUserID() {
        return $this->userID;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUserName() {
        return $this->userName;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function getAcctype() {
        return $this->acctype;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function setAcctype($acctype) {
        $this->acctype = $acctype;
    }

}


?>
