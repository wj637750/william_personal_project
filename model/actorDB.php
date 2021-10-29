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
            $a = new Actor($row['ActorID'],
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
}

