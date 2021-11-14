<?php
require ('model\database.php');
require ('model\userDB.php');
require ('model\user.php');
require ('model\movie.php');
require ('model\movieDB.php');
require ('model\comment.php');
require ('model\commentDB.php');
require ('model\role.php');
require ('model\movieImage.php');
require ('model\movieImagesDB.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'main';
    }
}

switch ($action) {
    case 'main':
    if (isset($_SESSION['verifiedUser'])) {
    $acctype = UserDB::getAccountType($_SESSION['verifiedUser']);
    }
    include('registration\main.php');
    break;
    die;
case 'user_register':
        if (!isset($firstName)) {
            $firstName = '';
        }
        if (!isset($lastName)) {
            $lastName = '';
        }
        if (!isset($userName)) {
            $userName = '';
        }
        if (!isset($email)) {
            $email = '';
        }
        if (!isset($password)) {
            $password = '';
        }
        include('Registration\user_register.php');
        break;
        die;
 case 'confirm_user':
        $firstName = filter_input(INPUT_POST, "firstName");
        $lastName = filter_input(INPUT_POST, "lastName");
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $userName = filter_input(INPUT_POST, "username");
        $password = filter_input(INPUT_POST, "password");
        $errorFName = '';
        $errorLName = '';
        $errorEmail = '';
        $errorUser = '';
        $errorPassword = '';
        
        if($firstName !== '')
        {
            $first_match = preg_match('/^[A-Z]/i', $firstName);
            
            if ($first_match === false){
                echo 'error';
            }else if ($first_match === 0){
                $errorFName = $errorFName . 'First Name must start with a letter';
            }
            
        }else{
            $errorFName = $errorFName . 'Please enter your first name';
        }
        

        //Validate Last Name input
        if($lastName !== '')
        {
            $last_match = preg_match('/^[A-Z]/i', $lastName);
            
            if ($last_match === false){
                echo 'error';
            }else if ($last_match === 0){
                $errorLName = $errorLName . 'Last Name must start with a letter';
            }
        }else{
            $errorLName = 'Please enter your last name';
        }
        

        //Validate Email input
        //Also checks to make sure that the input does not already exist within the database
        if($email !== '' && $email == TRUE)
        {
            if(UserDB::doesEmailExist($email))
            {
            $errorEmail = $errorEmail . 'An account with this email already exists';
            $email = '';
            }
        }
        else
        {
            $errorEmail = $errorEmail.'Please enter a properly formatted email';
            $email = '';
        }

        //Validate User Name input
        //Also checks to make sure that the input does not already exist within the database
        if($userName !== '')
           {
            
            $user_match = preg_match('/^[A-Z]/i', $userName);
            $user_l_match = preg_match('/.{4,30}/', $userName);
                    
            if($user_l_match === false) {
                echo 'error';
            } else if($user_l_match === 0){
                $errorUser = $errorUser . 'UserName must between 4 and 30 characters long';
            }
            
            if($user_match === false) {
                echo 'error';
            } else if ($user_match === 0){
                $errorUser = $errorUser . 'UserName must start with a letter';
            }
            
                    
            if(UserDB::doesUserNameExist($userName))
            {
            $errorUser = $errorUser . 'An account with this user name already exists';
            }
        }
        else
        {
            $errorUser = $errorUser . 'Please enter a username';
        }

        //Validate Password
        if($password !== '')
        {
            $length_match = preg_match('/.{10,30}/', $password);
            $case_match = preg_match('/[A-Z]/', $password);
            $lowerCase_match = preg_match('/[a-z]/', $password);
            $num_match = preg_match('/[0-9]/', $password);
            $character_match = preg_match('/[!@#$%^&*()_+\[\]{};\\|,.<>\/?]/', $password);
            
                if($length_match === false)
                {
                    echo 'error';
                } 
                else if ($length_match === 0)
                    {
                    $errorPassword = $errorPassword . 'Password must be at least 10 characters long ';
                    }
                    
                if($case_match === FALSE)
                    {
                   echo 'error';
                    }
                 else if ($case_match === 0)
                     {
                 $errorPassword = $errorPassword . 'Password must contain a capital letter ';
                     } 
                 
                if ($lowerCase_match === FALSE)
                        {
                        echo 'error';
                        } 
                else if ($lowerCase_match === 0)
                        {
                        $errorPassword = $errorPassword . 'Password must contain a lowercase letter ';
                        }
                
                if ($num_match === FALSE)
                    {
                        echo 'error';
                    } 
                else if ($num_match === 0)
                        {
                        $errorPassword = $errorPassword . 'Password must contain at least one number ';
                        }
                
                if ($character_match === FALSE)
                    {
                        echo 'error';
                    } 
                else if ($character_match === 0)
                    {
                        $errorPassword = $errorPassword . 'Password must contain at least one special character ';
                    } 
                }
  
        
        

        //If error messages exist, stop and return the user to the index page
        if($errorFName != '' || $errorEmail != '' || $errorUser != '' || $errorFName != '' || $errorPassword != '')
        {
            include('Registration\user_register.php');
            exit();
        }
        
        UserDB::addUser($userName, $email, $lastName, $firstName, $password);
        
        include('Registration\confirmation.php');
        die;
        break;
    case 'login_user':
        $changeNotice = '';
        include('user\login.php');
        die;
        break;
    
    case 'attemptLogin':
        $username = filter_input(INPUT_POST, "username");
        $password = filter_input(INPUT_POST, "password");
        $errorUsername = '';
        $errorPassword = '';
        
            if (!isset($username)) {
            $username = '';
            }
            
            if (!isset($password)) {
                $password = '';
            }
            
            // If no User Name was entered on the login form
            if($username == '')
            {
                $errorUsername = 'Please enter your User Name';
            } else {
                $errorUsername = '';
            }
            
            // If no Password was entered on the login form
            if($password == '')
            {
                $errorPassword = 'Please enter your Password';
            } else {
                $errorPassword = '';
            }
            
            // Check to make sure that the User exists in the DB
            if(!userDB::doesUserNameExist($username)) 
            {
            $errorUsername = 'That User Name does not exist in the database.';
            }
            
            
            // If the error messages are not empty
            if($errorUsername !== '' || $errorPassword !== '')
            {
                include('User\login.php');
                exit();
            } else { // Otherwise test the entered password again the password in the database
                $passwordActual = UserDB::loginVerifyPassword($username);
                if (!empty($passwordActual)) {
                    if (password_verify($password, $passwordActual[0])) { // If the password input from the form matches the password stored for that username
                        $_SESSION['verifiedUser'] = $username;
                        $_SESSION['userData'] = UserDB::retrieveUserData($_SESSION['verifiedUser']);
                        include('user\loginSuccess.php');
                    } else {
                        $errorPassword = 'Incorrect Password';
                        include('user\login.php');
                    }
                } else {
                        $errorPassword = 'Incorrect Password';
                        include('user\login.php');
                }
            }
    die;
    break;
        
    case 'logout':
        session_destroy();
        $action = 'user_register';
        header('Location: index.php');
    die;
    
    //Movie Cases
    
    case 'add_movie':
        if (!isset($movieName)) {
            $movieName = '';
        }
        if (!isset($movieGenre)) {
            $movieGenre = '';
        }
        if (!isset($movieRating)) {
            $movieRating = '';
        }
        include('movies\addMovie.php');
    break;
    die;
    
    case 'confirm_movie':
        $movieName = filter_input(INPUT_POST, "movieName");
        $movieGenre = filter_input(INPUT_POST, "movieGenre");
        $movieRating = filter_input(INPUT_POST, "movieRating");
        $errorMovieName = '';
        $errorGenre = '';
        $errorRating = '';
        
        if (!isset($movieName)) {
            $movieName = '';
            }
            
        if (!isset($movieRating)) {
            $movieRating = '';
        }
            
        // If no movie title was entered 
        if($movieName !== '')
        {
            $name_match = preg_match('/^[A-Z]/i', $movieName);
            
            if ($name_match === false){
                echo 'error';
            }else if ($name_match === 0){
                $errorMovieName = $errorMovieName . 'Movie Title must start with a letter';
            }
        } else {
            $errorMovieName = $errorMovieName . 'Please enter a title';
        }
            
        
        if($movieRating !== '')
         {
             $rating_match = preg_match('/^([1-9]|10)$/i', $movieRating);
             
             if ($rating_match === false){
                 echo 'error';
             }else if ($rating_match === 0){
                 $errorRating = $errorRating . 'Movie Rating must be a valid number between 1 and 10';
             }
             
         }else{
             $errorRating = $errorRating . 'Please enter your a movie Rating';
         }
         
         //error check
         if($errorMovieName != '' || $errorGenre != '' || $errorRating != "")
         {
             include('movies\addMovie.php');
             exit();
         }
         
         movieDB::addMovie($movieName, $movieGenre, $movieRating);
         include('movies\confirmation.php');
        
    break;
    
    case 'display_movies';
        $movies = movieDB::getMovies();
        include('movies\listmovies.php');
    break;

    case 'search_movies':
        $search = filter_input(INPUT_GET, 'search');
        $movies = movieDB::getMoviesbySearch($search);
        include('movies\listmovies.php');
        
    break;
    
    case 'movie_page';
        
        if (isset($_SESSION['verifiedUser'])) {
        $acctype = UserDB::getAccountType($_SESSION['verifiedUser']);
        }
        
        $movieID = filter_input(INPUT_GET, 'movieID');
        $_SESSION['otherMovieID'] = $movieID;
        $movie = movieDB::retrieveMovieDataByID($movieID);
        //comments here
        $comments = CommentDB::getCommentsByMovieId($_SESSION['otherMovieID']);
        //get movie image here
        
        $imageMovie = movieImageDB::getImagesWithMovieID($_SESSION['otherMovieID']);
        if (empty($imageMovie)) {
                $actualImage[0] = "image/default.png";
            } else if ($imageMovie === null) {
                $actualImage[0] = 'image/default.png';
            } else {
            $actualImage = $imageMovie[0];
            }
        
        include ('movies\moviepage.php');
    break;
    die;
    case 'leaveComment':
        
        if (isset($_SESSION['verifiedUser'])) {
        $acctype = UserDB::getAccountType($_SESSION['verifiedUser']);
        }
        
        $movie = movieDB::retrieveMovieDataByID($_SESSION['otherMovieID']);
        $comment = filter_input(INPUT_POST, "comment");
        
        if ($comment != '') {
            $sendingID = UserDB::retrieveUserID($_SESSION['verifiedUser']);
            commentDB::addComment($sendingID, $_SESSION['otherMovieID'], $comment);
        }
        $comments = CommentDB::getCommentsByMovieId($_SESSION['otherMovieID']);;
        
        $imageMovie = movieImageDB::getImagesWithMovieID($_SESSION['otherMovieID']);
        if (empty($imageMovie)) {
                $actualImage[0] = "image/default.png";
            } else if ($imageMovie === null) {
                $actualImage[0] = 'image/default.png';
            } else {
            $actualImage = $imageMovie[0];
            }
        
        include ('movies\moviepage.php');
    break;
    die;
    case 'upload_movie_image':
        
        if (isset($_SESSION['verifiedUser'])) {
        $acctype = UserDB::getAccountType($_SESSION['verifiedUser']);
        }   
        
        $movieID = $_SESSION['otherMovieID'];
        $comments = CommentDB::getCommentsByMovieId($_SESSION['otherMovieID']);
        
        $movieID = $_SESSION['otherMovieID'];
        $movie = movieDB::retrieveMovieDataByID($movieID);
        $movies = movieDB::getMoviesByActor($_SESSION['actorID']);
        if(isset($_FILES['image'])){
            $setDefualt = true;
            
            $errorMoviePageImage = '';
            
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
                move_uploaded_file($file_tmp,"image/".$fileNameNew);
                
                $movieData = movieDB::retrieveMovieData($_SESSION['otherMovieID']);
                //var_dump($userData);
                
                movieImageDB::addImage("image/".$fileNameNew, $movieData['movieID'] );
                $imageMovie = movieImageDB::getImagesWithMovieID($movieData['movieID']);
                $actualImage = $imageMovie[0];
                //echo "Success";
              //echo "<img src='Image/default.png'>";
                $changeNotice = 'Image Uploaded';
              //echo '<img src =../image/'.$file_name;
                include ('movies\moviepage.php');
            } else{
                //var_dump($errors);
                $changeNotice = 'Image Upload Failed';
                
                $errorMoviePageImage = $errorMoviePageImage . 'Please select an image';
                
                $movieData = movieDB::retrieveMovieData($_SESSION['otherMovieID']);
                
                $imageMovie = movieImageDB::getImagesWithMovieID($movieData['movieID']);
                    if (empty($imageMovie)) {
                        $actualImage[0] = "image/default.png";
                    } else if ($imageMovie === null) {
                        $actualImage[0] = 'image/default.png';
                    } else {
                    $actualImage = $imageMovie[0];
                    }
                
                include ('movies\moviepage.php');
            }
        }
        
    break;

}