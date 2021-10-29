<?php
require ('..\model\database.php');
require ('..\model\userDB.php');
require ('..\model\user.php');
require ('..\model\movie.php');
require ('..\model\movieDB.php');
require ('..\model\comment.php');
require ('..\model\commentDB.php');
require ('..\model\actor.php');
require ('..\model\actorDB.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'add_actor';
    }
}

switch ($action) {
    case 'add_actor':
        if (!isset($actorFirstName)) {
            $actorFirstName = '';
        }
        if (!isset($actorLastName)) {
            $actorLastName = '';
        }
        if (!isset($actorBio)) {
            $actorBio = '';
        }
        include('addActor.php');
    break;
    die;
    
    case 'confirm_actor':
        $actorFirstName = filter_input(INPUT_POST, 'actorFirstName');
        $actorLastName = filter_input(INPUT_POST, 'actorLastName');
        $actorBio = filter_input(INPUT_POST, 'actorBio');
        $errorActorName = '';
        $errorActorLastName = '';
        $errorBio = '';
        
        if (!isset($actorFirstName)) {
            $actorFirstName = '';
            }
            
        if (!isset($actorLastName)) {
            $actorLastName = '';
        }
        
        if (!isset($actorBio)) {
            $actorBio = '';
        }
        
        if($actorFirstName !== '')
        {
            $first_match = preg_match('/^[A-Z]/i', $actorFirstName);
            if ($first_match === false){
                echo 'error';
            }else if ($first_match === 0){
                $errorActorName = $errorActorName . 'Actor name must start with a letter';
            }
        } else {
            $errorActorName = $errorActorName . 'Please enter a name';
        }
        
        if($actorLastName !== '')
        {
            $last_match = preg_match('/^[A-Z]/i', $actorLastName);
            if ($last_match === false){
                echo 'error';
            }else if ($last_match === 0){
                $errorActorLastName = $errorActorLastName . 'Actor name must start with a letter';
            }
        } else {
            $errorActorLastName = $errorActorLastName . 'Please enter a name';
        }
        
        if($actorBio == '')
        {
            $errorBio = $errorBio . 'Please enter a bio';
        }
        
        //error check
        if($errorActorName != '' || $errorBio != '')
        {
            include('addActor.php');
            exit();
        }
        
        actorDB::addActor($actorFirstName, $actorLastName, $actorBio);
        include('actorConfirmation.php');
    break;
    case 'list_actors':
        $actors = actorDB::getActors();
        include('listactors.php');
    break;
        
}

