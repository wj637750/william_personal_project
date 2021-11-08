<?php

class Image {
    
    private $imageId, $filePath, $actorID;
    
    public function __construct($filepath, $actorID) {
        $this->filePath = $filepath;
        $this ->actorID = $actorID;
    }
    
    public function getImageId(){
        return $this->imageId;
    }
    
    public function getFilePath(){
        return $this->filePath;
    }
    
    public function getActorID(){
        return $this->actorID;
    }
    
    public function setImageId(){
        $this->imageId = $imageId;
    }
    
    public function setFilePath(){
        $this->filePath = $filePath;
    }
    
    public function setActorID(){
        $this->actorID = actorID;
    }
}

?>

