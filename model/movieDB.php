<?php

class movieDB {
    
     public static function getMovies()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT *
                       FROM movies';
        
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows =  $statement->fetchAll();
        $statement->closeCursor();
        
        $movies = array();
        foreach ($rows as $row) {
            $m = new Movie($row['movieID'],
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
    
    public static function retrieveMovieDataByID($movieID)
    {
        $db = Database::getDB();
        
        $query = "SELECT * "
                . "FROM movies "
                . "WHERE movieID = :movieID";
        $statement = $db->prepare($query);
        $statement->bindValue(':movieID', $movieID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        
        $movie = new Movie($row['movieID'],
                           $row['movieName'],
                           $row['movieGenre'],
                           $row['movieRating'],
                           '');
        return $movie;
    }
    
    public static function retrieveMovieData($movieID)
    {
        $db = Database::getDB();
        
        $query = "SELECT * "
                . "FROM movies "
                . "WHERE movieID = :movieID";
        $statement = $db->prepare($query);
        $statement->bindValue(':movieID', $movieID);
        $statement->execute();
        $movieData = $statement->fetch();
        $statement->closeCursor();
        
        return $movieData;
    }
    
    
    
    public static function getMoviesByActor($actorID)
    {
        $db = Database::getDB();
        
        $query =  "SELECT movies.*, actorlink.* "
                . "FROM movies "
                . "JOIN actorlink "
                . "ON actorlink.movieID = movies.movieID "
                . "WHERE actorlink.actorID = :actorID";
        
        $statement = $db->prepare($query);
        $statement->bindValue(':actorID', $actorID);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $movies = array();
        foreach ($rows as $row) {
            $m = new Movie($row['movieID'],
                           $row['movieName'],
                           $row['movieGenre'],
                           $row['movieRating'],
                           '');
            $movies[] = $m;
        }
        
        
//        $roles = array();
//        foreach ($rows as $row) {
//            $r = new Role($row['role'],
//                           '');
//                }
//        
//        array_push($movies, $roles);
        return $movies;
    }
    
    public static function getRoleByActor($actorID, $movieID)
    {
        $db = Database::getDB();
        
        $query = 'SELECT role '
                . 'FROM actorlink '
                . 'WHERE actorID = :actorID AND movieID = :movieID';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':actorID', $actorID);
        $statement->bindValue(':movieID', $movieID);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();
        
        $roles = array();
        foreach ($rows as $row) {
            $r = new Role($row['role'],
                           '');
                }
                
        return $roles;
    }
    
}

