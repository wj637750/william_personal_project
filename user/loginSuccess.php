<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>Welcome</title>
    </head>
    <?php include 'view\header.php'?>
    <body>
        <div class='container'>
            <h1 class='text-orange'>Login Successful</h1>
            
            <p class='text-white'>Welcome, <?php echo $_SESSION['verifiedUser']; ?>!</p>
            <br>
            <p class='text-white'>Return to <a href="?action=main">main</a></p>
            
        </div>
        
        
    </body>
    <?php include 'view\footer.php'; ?>
</html>