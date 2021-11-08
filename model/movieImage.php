<?php

class movieImage {
    
    private $imageId, $filePath, $movieID;
    
    public function __construct($filepath, $movieID) {
        $this->filePath = $filepath;
        $this ->movieID = $movieID;
    }
    
    public function getImageId(){
        return $this->imageId;
    }
    
    public function getFilePath(){
        return $this->filePath;
    }
    
    public function getMovieID(){
        return $this->movieID;
    }
    
    public function setImageId(){
        $this->imageId = $imageId;
    }
    
    public function setFilePath(){
        $this->filePath = $filePath;
    }
    
    public function setMovieID(){
        $this->movieID = $movieID;
    }
}

?>
