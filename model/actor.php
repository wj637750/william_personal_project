<?php

class Actor{
    private $actorID, $actorFirstName, $actorLastName, $actorBio;


public function __construct($actorID, $actorFirstName, $actorLastName, $actorBio) {
    $this->actorID = $actorID;
    $this->actorFirstName = $actorFirstName;
    $this->actorLastName = $actorLastName;
    $this->actorBio = $actorBio;
}

public function getActorID() {
    return $this->actorID;
}

public function setActionID($actorID) {
    $this->actorID = $actorID;
}

public function getActorFirstName() {
    return $this->actorFirstName;
}

public function setActorFirstName($actorFirstName) {
    $this->actorFirstName = $actorFirstName;
}

public function getActorActorLastName() {
    return $this->actorLastName;
}

public function setActorLastName($actorLastName) {
    $this->actorLastName = $actorLastName;
}

public function getActorFullName() {
        return $this->actorFirstName . ' ' . $this->actorLastName;
    }

public function getActorBio() {
    return $this->actorBio;
}

public function setActorBio($actorBio) {
    $this->actorBio = $actorBio;
}

}
