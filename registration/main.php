<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="main.css"
    </head>
  <?php include 'view\header.php'?> 
    <body>
        
        <form action="index.php" method="post" id="user_register">
        <input type="hidden" name="action" value="user_register" />
        <input type="submit" value="Register New User">
        </form>
        
         <form action="index.php" method="post" id="login">
        <input type="hidden" name="action" value="login" />
        <input type="submit" value="login">
        </form>
        
        <ul>
            <?php if (!isset($_SESSION['verifiedUser'])) {?>
                <li><a href="?action=user_register">Register</a></li>
                <li><a href="?action=login_user">login</a></li>
             <?php } ?>
             <?php if (isset($_SESSION['verifiedUser']) && $acctype[0] === 'Admin') {?>
                <li><a href="?action=add_movie">Add a movie to the database</a></li>
                <li><a href="actors?action=add_actor">Add an Actor to the database</a></li>
            <?php } ?>
                <li><a href="?action=display_movies">view movie database</a></li>
                
                <li><a href="actors?action=list_actors">View actor database</a></li>
        </ul>
        
        <?php if (isset($_SESSION['verifiedUser'])) 
        {?>
            Welcome, <?php echo $_SESSION['verifiedUser']; ?>!
            <a href="?action=logout">logout</a>
        <?php } ?>
        
        
    </body>
</html>
