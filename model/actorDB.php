<?php

class actorDB {
    
    public static function getActors()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT *
                       FROM actors';
        
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows =  $statement->fetchAll();
        $statement->closeCursor();
        
        $actors = array();
        foreach ($rows as $row) {
            $a = new Actor($row['actorID'],
                          $row['actorFirstName'],
                          $row['actorLastName'],
                          $row['actorBio'],
                          '');
            $actors[] = $a;
        }

        return $actors;
    }
    
    public static function addActor($actorFirstName, $actorLastName, $actorBio)
    {
        $db = Database::getDB();

        $query = "insert into actors"
            . "(actorFirstName, actorLastName, actorBio)"
            . "values (:actorFirstName, :actorLastName, :actorBio)";
        $statement = $db->prepare($query);
        $statement->bindValue(':actorFirstName', $actorFirstName);
        $statement->bindValue(':actorLastName', $actorLastName);
        $statement->bindValue(':actorBio', $actorBio);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function retrieveActorDataByID($actorID)
    {
        $db = Database::getDB();
        
        $query = "SELECT * "
                . "FROM actors "
                . "WHERE actorID = :actorID";
        $statement = $db->prepare($query);
        $statement->bindValue(':actorID', $actorID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        
        $actor = new Actor($row['actorID'],
                           $row['actorFirstName'],
                           $row['actorLastName'],
                           $row['actorBio'],
                          '');
        return $actor;
    }
    
    public static function retrieveUserData($actorID)
    {
        $db = Database::getDB();
        
        $query = "SELECT * "
                . "FROM actors "
                . "WHERE actorID = :actorID";
        $statement = $db->prepare($query);
        $statement->bindValue(':actorID', $actorID);
        $statement->execute();
        $actorData = $statement->fetch();
        $statement->closeCursor();
        
        return $actorData;
    }
    
    
    public static function addActorLink($actorID, $movieID, $actorRole)
    {
        $db = Database::getDB();

        $query = "insert into actorlink"
            . "(actorID, movieID, role)"
            . "values (:actorID, :movieID, :role)";
        $statement = $db->prepare($query);
        $statement->bindValue(':actorID', $actorID);
        $statement->bindValue(':movieID', $movieID);
        $statement->bindValue(':role', $actorRole);
        $statement->execute();
        $statement->closeCursor();
    }
}

