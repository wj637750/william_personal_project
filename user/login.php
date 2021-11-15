<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css">
        <title>User Login</title>
    </head>
    <?php include 'view\header.php'?>
    <body>
        <div class='container'>
            <h1 class='text-orange'>User Login</h1>
            <form action="index.php" method="post" id="attemptLogin">
                <input type="hidden" name="action" value="attemptLogin" />
                
            <!-- User Name error display -->
            <?php if (!empty($errorUsername)) {
                ?> <p class='text-orange' > <?php echo htmlspecialchars($errorUsername); 
            } ?></p>
            <br>
            <!-- User Name input field -->
            <label class='text-white'>User Name</label><br>
            <input type="text" name="username"
                value="">
            <!-- <?php echo htmlspecialchars($username); ?> -->
            <br><br>
            
            <!-- Password error display -->
            <?php if (!empty($errorPassword)) { 
                ?> <p class='text-orange'> <?php echo htmlspecialchars($errorPassword); 
                } ?> </p>
            <br>
            <!-- Password input field -->
            <label class='text-white'>Password</label><br>
            <input type="password" name="password"
                value="">
            <!-- <?php echo htmlspecialchars($password); ?> -->
            <br><br>

            <input type="submit" value="Login">
            <br><br><br>
            </form>
            
        </div
        
    </div>
    </body>
</html>

