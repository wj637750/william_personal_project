<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>Welcome</title>
    </head>
    <?php //include 'view\header.php'?>
    <body>
        <div id="wrapper">
            <h1>Login Successful</h1>
            
            Welcome, <?php echo $_SESSION['verifiedUser']; ?>!
            <br><br>
            Return ti <a href="?action=main">main</a>
            
        </div>
        
        
    </body>
</html>