<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
              <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\main.css">
    </head>
    <body>
        
        <nav class='navbar navbar-expand-sm navbar-dark'>
            <div class='container'>
                <a class='navbar-brand' href='<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\?action=main'>IMDB</a>
                <ul class='nav navbar-nav'>
                    
                    <?php if (isset($_SESSION['verifiedUser'])) { ?>
                        <li class="nav-item"><a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\index.php\?action=add_movie">Add a movie to the database</a></li>
                        <li class="nav-item"><a  class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\actors\?action=add_actor">Add an Actor to the database</a></li>
                    <?php } ?>
                    <li class="nav-item"><a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\index.php?action=display_movies">view movie database</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\actors?action=list_actors">View actor database</a></li>
                    
                </ul>
                <ul class='nav navbar-nav navbar-right'>
                    <?php if (!isset($_SESSION['verifiedUser'])) { ?>
                        <li><a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\index.php\?action=user_register">Register</a></li>
                        <li><a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\index.php\?action=login_user">login</a></li>
                    <?php } ?>
                    <?php if (isset($_SESSION['verifiedUser'])) { ?>
                        <li><a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>\williamindividual\index.php\?action=logout">logout</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        
    </body>
