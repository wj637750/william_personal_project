<?php

class Movie {
    
    private $movieID, $movieName, $movieGenre, $movieRating, $movieBio;
    
    public function __construct($movieID, $movieName, $movieGenre, $movieRating, $movieBio) {
        $this->movieID = $movieID;
        $this->movieName = $movieName;
        $this->movieGenre = $movieGenre;
        $this->movieRating = $movieRating;
        $this->movieBio = $movieBio;
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
    
    public function getMovieBio() {
        return $this->movieBio;
    }
    
    public function setMovieBio($movieBio) {
        $this->movieBio = $movieBio;
    }
    
    
}

?>

