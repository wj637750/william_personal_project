<?php

class movieImageDB{
    
    
    public static function getImages()
    {
        $db = Database::getDB();
        
        $queryImages = 'SELECT * FROM movieimages';
        $statement = $db->prepare($queryImages);
        $statement->execute();
        $images = $statement->fetchAll();
        $statement->closeCursor();
        return $images;
    }

    public static function addImage($filePath, $movieID)
    {
        $db = Database::getDB();
        
        $query = "insert into movieimages"
            . "(filePath, movieID)"
            . "values (:filePath, :movieID)";
        $statement = $db->prepare($query);
        $statement->bindValue(':filePath', $filePath);
        $statement->bindValue(':movieID', $movieID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function getImagesWithMovieID($movieID)
    {
        $db = Database::getDB();
        
        //if(isset((images.userID))
        
        $query = "SELECT filePath FROM movieimages JOIN movies ON movieimages.movieID = movies.movieID WHERE movies.movieID = :movieID ORDER BY filePath DESC ";
        $statement = $db->prepare($query);
        $statement->bindValue(':movieID', $movieID);
        $statement->execute();
        $imageUser = $statement->fetchAll();
        $statement->closeCursor();
        return $imageUser;
    }
    
    public static function retrieveImageByMovieID($movieID)
    {
        $db = Database::getDB();
        
        $query = 'SELECT filePath
                  FROM movieimages
                  WHERE movieID = :movieID';
        $statement = $db->prepare($query);
        $statement->bindValue(':movieID', $movieID);
        $statement->execute();
        $filePath = $statement->fetch();
        $statement->closeCursor();
        
        return $filePath;
    }
}