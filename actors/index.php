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
require ('..\model\role.php');
require ('..\model\image.php');
require ('..\model\imageDB.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_actors';
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
    case 'actor_page':
        $actorID = filter_input(INPUT_POST, 'actorID');
        $_SESSION['actorID'] = $actorID;
        $actor = actorDB::retrieveActorDataByID($actorID);
        $movies = movieDB::getMoviesByActor($_SESSION['actorID']);
        
        

        $imageActor = imageDB::getImagesWithActorID($_SESSION['actorID']);
        if (empty($imageActor)) {
                $actualImage[0] = "../images/default.png";
            } else if ($imageActor === null) {
                $actualImage[0] = '../images/default.png';
            } else {
            $actualImage = $imageActor[0];
            }
        
        include ('actorpage.php');
    break;
    case 'link_movie';
        $movies = movieDB::getMovies();
        include('link_movie.php');
    break;
    case 'link_actor':
        $actorRole = filter_input(INPUT_POST, 'actorRole');;
        $actorID = $_SESSION['actorID'];
        $movieID = filter_input(INPUT_POST, 'movieID');
        
        actorDB::addActorLink($actorID, $movieID, $actorRole);
        
        $actor = actorDB::retrieveActorDataByID($actorID);
        $movies = movieDB::getMoviesByActor($_SESSION['actorID']);
        include ('actorpage.php');
    break;
    case 'upload_image':
        if(isset($_FILES['image'])){
            $setDefualt = true;
            
            $errorActorPageImage = '';
            
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $temp = $_FILES['image']['name'];
            $temp = explode('.', $temp);
            $temp = end($temp);
            $file_ext = strtolower($temp);
            
            $extensions= array("jpeg", "jpg", "png", "gif"); 
            
             $fileNameNew = uniqid('',true).".".$file_ext;
            
            if(in_array($file_ext,$extensions) === false){
                
                $errors[]="file extension not in whitelist: " . join(',',$extensions);
            }
            
            if(empty($errors)=== true){
                move_uploaded_file($file_tmp,"Image/".$fileNameNew);
                
                $actorData = actorDB::retrieveActorDataByID($_SESSION['actorID']);
                //var_dump($userData);
                
                imageDB::addImage("Image/".$fileNameNew, $userData['userID'] );
                $imageActor = imageDB::getImagesWithUserID($userData['userID']);
                $actualImage = $imageActor[0];
                //echo "Success";
              //echo "<img src='Image/default.png'>";
                $changeNotice = 'Image Uploaded';
              echo '<img src =Image/'.$file_name;
                include 'UserPage\userPage.php';
            } else{
                //var_dump($errors);
                $changeNotice = 'Image Upload Failed';
                
                $errorUserPageImage = $errorUserPageImage . 'Please select an image';
                
                $actorData = actorDB::retrieveActorDataByID($_SESSION['actorID']);
                
                $imageActor = imageDB::getImagesWithUserID($userData['userID']);
                    if (empty($imageActor)) {
                        $actualImage[0] = "image/default.png";
                    } else if ($imageActor === null) {
                        $actualImage[0] = 'Image/default.png';
                    } else {
                    $actualImage = $imageActor[0];
                    }
                
                include 'UserPage\userPage.php';
            }
        }
        
    break;
        
        
        
}

