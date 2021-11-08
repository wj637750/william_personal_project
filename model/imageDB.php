<?php

class imageDB{
    
    
    public static function getImages()
    {
        $db = Database::getDB();
        
        $queryImages = 'SELECT * FROM images';
        $statement = $db->prepare($queryImages);
        $statement->execute();
        $images = $statement->fetchAll();
        $statement->closeCursor();
        return $images;
    }

    public static function addImage($filePath, $actorID)
    {
        $db = Database::getDB();
        
        $query = "insert into images"
            . "(filePath, actorID)"
            . "values (:filePath, :actorID)";
        $statement = $db->prepare($query);
        $statement->bindValue(':filePath', $filePath);
        $statement->bindValue(':actorID', $actorID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function getImagesWithActorID($actorID)
    {
        $db = Database::getDB();
        
        //if(isset((images.userID))
        
        $query = "SELECT filePath FROM images JOIN actors ON images.actorID = actors.actorID WHERE actors.actorID = :actorID ORDER BY filePath DESC ";
        $statement = $db->prepare($query);
        $statement->bindValue(':actorID', $actorID);
        $statement->execute();
        $imageUser = $statement->fetchAll();
        $statement->closeCursor();
        return $imageUser;
    }
    
    public static function retrieveImageByActorID($actorID)
    {
        $db = Database::getDB();
        
        $query = 'SELECT filePath
                  FROM images
                  WHERE actorID = :actorID';
        $statement = $db->prepare($query);
        $statement->bindValue(':actorID', $actorID);
        $statement->execute();
        $filePath = $statement->fetch();
        $statement->closeCursor();
        
        return $filePath;
    }
}
?>