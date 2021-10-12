<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="main.css">
        <title><?php echo $_SESSION['verifiedUser']; ?>'s Page</title>
    </head>
    <?php include 'view\header.php'?>
    <body>
        <div id="wrapper">
            <h1>User Page for <?php echo $_SESSION['verifiedUser']; ?></h1>
            
        <!-- ************************* image area ************************************-->
        
                <?php if (!empty($errorUserPageImage)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorUserPageImage); 
                } ?>
                        <br>
                        <br>
                <!--<img src="image/default.png">-->
                <img src='<?php echo $actualImage[0] ?>' width='500' height = '500'>
                
        <!-- ************************* image area ************************************-->
            
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="uploadImage"/>
                <input type="file" name="image" /> <br>
                <input type="submit" value="Change profile pic"/>
            </form>
            
            <br>
            <?php echo $changeNotice  ?>
            <br>
            <b>Name: </b>
            <?php echo $_SESSION['userData'][0];  ?> <?php echo $_SESSION['userData'][1];  ?>
            <br>
            <b>Email Address: </b>
             <?php echo $_SESSION['userData'][2];  ?>
            <br>
            <b>User Name: </b>
             <?php echo $_SESSION['userData'][3];  ?>
            <br>
        </div>
        
        
    </body>
</html>
