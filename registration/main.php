<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="main.css"
    </head>
  <?php include 'view\header.php'?> 
    <body>
        <div class="container">
        <h1 class='text-orange'>Internet Movie Database</h1>
        <br>
        <ul>
            <?php if (!isset($_SESSION['verifiedUser'])) {?>
                <li><a href="?action=user_register" class="text-white">Register</a></li>
                <li><a href="?action=login_user" class="text-white">login</a></li>
             <?php } ?>
             <?php if (isset($_SESSION['verifiedUser']) && $acctype[0] === 'Admin') {?>
                <li><a href="?action=add_movie" class="text-white">Add a movie to the database</a></li>
                <li><a href="actors?action=add_actor" class="text-white">Add an Actor to the database</a></li>
            <?php } ?>
                <li><a href="?action=display_movies" class="text-white">view movie database</a></li>
                
                <li><a href="actors?action=list_actors" class="text-white">View actor database</a></li>
        </ul>
        
        <?php if (isset($_SESSION['verifiedUser'])) 
        {?>
            <p class="text-orange">Welcome, <?php echo $_SESSION['verifiedUser']; ?>!</p>
            <a class='text-white' href="?action=logout">logout</a>
        <?php } ?>
        
        </div>
    </body>
</html>
