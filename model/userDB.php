<?php

class UserDB {

    // This function selects all users
    public static function getUsers()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT *
                       FROM user';
        
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows =  $statement->fetchAll();
        $statement->closeCursor();
        
        $users = array();
        foreach ($rows as $row) {
            $u = new User($row['userID'],
                          $row['firstName'],
                          $row['lastName'],
                          $row['email'],
                          $row['userName'],
                          $row['acctype'],
                          '');
            $users[] = $u;
        }

        return $users;
    }

    // This function adds a user to the DB
    public static function addUser($username, $email, $lastName, $firstName, $password)
    {
        $db = Database::getDB();

        //Password Hash
        $hash = password_hash($password, PASSWORD_BCRYPT);
        
        $query = "insert into user"
            . "(firstName, lastName, email, userName, password)"
            . "values (:firstName, :lastName, :email, :userName, :password)";
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':userName', $username);
        $statement->bindValue(':password', $hash);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function doesEmailExist($email)
    {
        $db = Database::getDB();

        $query = 'SELECT email 
                  FROM user
                  where email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $results =  $statement->fetchAll();
        $statement->closeCursor();

        if (count($results) > 0)
        {
            return TRUE; 
        } else {
            return FALSE;
        }
    }

        // doesUserNameExist($userName)
        // Will return a TRUE value if the User Name exists in the database
        // **Only allow a registration to enter into the DB if a FALSE value is returned
    public static function doesUserNameExist($userName)
    {
        $db = Database::getDB();

        $query = 'SELECT userName FROM user where userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $results =  $statement->fetchAll();
        $statement->closeCursor();

        if (count($results) > 0)
        {  
            return TRUE; 
        } else { 
            return FALSE;
        }
    }
    
    public static function loginVerifyPassword($userName)
    {
        $db = Database::getDB();

        $query = 'SELECT password FROM user where userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $password = $statement->fetch();
        $statement->closeCursor();

        return $password;
    }
    
    public static function retrieveUserData($userName)
    {
        $db = Database::getDB();
        
        $query = 'SELECT firstName, lastName, email, userName, userID  FROM user where userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $userData = $statement->fetch();
        $statement->closeCursor();
        
        return $userData;
    }
    
    public static function retrieveUserDataByID($userID)
    {
        $db = Database::getDB();
        
        $query = 'SELECT *
                  FROM user
                  WHERE userID = :userID';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        
        $user = new User($row['userID'],
                         $row['firstName'],
                         $row['lastName'],
                         $row['email'],
                         $row['userName'],
                         $row['acctype'],
                         ''); 
        
        return $user;
    }
    
    public static function retrieveUserID($userName)
    {
        $db = Database::getDB();
        
        $query = 'SELECT userID FROM user where userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $userID = $statement->fetch();
        $statement->closeCursor();
        
        return $userID[0];
    }
    
    public static function retrieveUserName($userId)
    {
        $db = Database::getDB();
        
        $query = 'SELECT userName FROM user where userID = :userId';
        $statement = $db->prepare($query);
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        $userID = $statement->fetch();
        $statement->closeCursor();
        
        return $userID[0];
    }
    
    public static function getAccountType($username)
    {
        $db = Database::getDB();
        
        $query = 'SELECT acctype FROM user WHERE userName = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $acctype = $statement->fetch();
        $statement->closeCursor();
        
        return $acctype;
    }
    
}
?>