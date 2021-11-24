<?php

class roleDB {
    
public static function retrieveRoleByActorAndMovie($actorID, $movieID)
    {
        $db = Database::getDB();
        
        $query = 'SELECT role '
                . 'FROM actorlink '
                . 'WHERE actorID = :actorID AND movieID = :movieID';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':actorID', $actorID);
        $statement->bindValue(':movieID', $movieID);
        $statement->execute();
        $role = $statement->fetch();
        $statement->closeCursor();
        
        //$roles = array();
        //foreach ($rows as $row) {
        //    $r = new Role($row['role'],
        //                   '');
        //        }
                
        return $role;
    }
}

