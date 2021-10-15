<?php

class Movie {
    
    private $movieID, $movieName, $movieGenre, $movieRating;
    
    public function __construct($movieID, $movieName, $movieGenre, $movieRating) {
        $this->movieID = $movieID;
        $this->movieName = $movieName;
        $this->movieGenre = $movieGenre;
        $this->movieRating = $movieRating;
    }
    
    public function getMovieID() {
        return $this->movieID;
    }
    
    public function setMovieID($movieID) {
        $this->movieID = $movieID;
    }

    public function getMovieName() {
        return $this->movieName;
    }
    
    public function setMovieName($movieName) {
        $this->movieName = $movieName;
    }
    
    public function getMovieGenre() {
        return $this->movieGenre;
    }
    
    public function setMovieGenre($movieGenre) {
        $this->movieGenre = $movieGenre;
    }
    
    public function getMovieRating() {
        return $this->movieRating;
    }
    
    public function setMovieRatinge($movieRating) {
        $this->movieRating = $movieRating;
    }
    
    
}

?>

