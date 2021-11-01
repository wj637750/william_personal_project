<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css"
    </head>
    <body>
        <div class='header'>
        <nav class='nav'>
            <ul>
            <?php if (!isset($_SESSION['verifiedUser'])) {?>
                <li><a href="?action=user_register">Register</a></li>
                <li><a href="?action=login_user">login</a></li>
             <?php } ?>
             <?php if (isset($_SESSION['verifiedUser'])) {?>
                <li><a href="?action=add_movie">Add a movie to the database</a></li>
                <li><a href="actors?action=add_actor">Add an Actor to the database</a></li>
            <?php } ?>
                <li><a href="?action=display_movies">view movie database</a></li>
                <li><a href="actors?action=list_actors">View actor database</a></li>
            <?php if (isset($_SESSION['verifiedUser'])) {?>
                <li><a href="?action=logout">logout</a></li>
            <?php } ?>
            </ul>   
        </nav>
        </div>
    </body>
