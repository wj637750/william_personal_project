<?php

class movieDB {
    
     public static function getMovies()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT *
                       FROM user';
        
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows =  $statement->fetchAll();
        $statement->closeCursor();
        
        $movies = array();
        foreach ($rows as $row) {
            $m = new User($row['movieID'],
                          $row['movieName'],
                          $row['movieGenre'],
                          $row['movieRating'],
                          '');
            $movies[] = $m;
        }

        return $movies;
    }
    
    public static function addMovie($movieName, $movieGenre, $movieRating)
    {
        $db = Database::getDB();
    
        $query = "insert into movies"
            . "(movieName, movieGenre, movieRating)"
            . "values (:movieName, :movieGenre, :movieRating)";
        $statement = $db->prepare($query);
        $statement->bindValue(':movieName', $movieName);
        $statement->bindValue(':movieGenre', $movieGenre);
        $statement->bindValue(':movieRating', $movieRating);
        $statement->execute();
        $statement->closeCursor();
    }
    
    
}

