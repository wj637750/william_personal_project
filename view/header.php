<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
              <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
              integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
              <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\main.css">
    </head>
    <body>
        
        <nav class='navbar navbar-inverse'>
            <div class='container'>
                <div class='navbar-header'>
                    <a class='navbar-brand' href='<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\?action=main'>IMDB</a>
                </div>
                <ul class='nav navbar-nav'>
                    
                    <?php if (isset($_SESSION['verifiedUser'])) { ?>
                        <li class='active'><a href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\index.php\?action=add_movie">Add a movie to the database</a></li>
                        <li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\actors\?action=add_actor">Add an Actor to the database</a></li>
                    <?php } ?>
                    <li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\index.php?action=display_movies">view movie database</a></li>
                    <li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\actors?action=list_actors">View actor database</a></li>
                    
                </ul>
                <ul class='nav navbar-nav navbar-right'>
                    <?php if (!isset($_SESSION['verifiedUser'])) { ?>
                        <li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\index.php\?action=user_register">Register</a></li>
                        <li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\index.php\?action=login_user">login</a></li>
                    <?php } ?>
                    <?php if (isset($_SESSION['verifiedUser'])) { ?>
                        <li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\index.php\?action=logout">logout</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        
    </body>
