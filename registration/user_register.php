<!DOCTYPE html>
<html>
    <?php include 'view\header.php'?>
    <body>
        <h1>Registration</h1>
        
        <form action="index.php" method="post" id="confirm_user">
            <input type="hidden" name="action" value="confirm_user" />
            
            <!--first name-->
                <?php if (!empty($errorFName)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorFName);
                } ?> <br>
                
                <label>First Name</label><br>
                <input type="text" name="firstName"
                       value="<?php echo htmlspecialchars($firstName); ?>">
                <br>
                
            <!--last name-->
                <?php if (!empty($errorLName)) {
                    ?> <p class="error"> <?php echo htmlspecialchars($errorLName);    
                } ?> 
                <br>
                
                <label>Last Name</label><br>
                <input type="text" name="lastName"
                       value="<?php echo htmlspecialchars($lastName); ?>">
                <br>
                
            <!--user name-->
                <?php if (!empty($errorUser)) {
                    ?><p class="error"><?php echo htmlspecialchars($errorUser);
                } ?>
                <br>
                
                <label>Username</label><br>
                <input type="text" name="username"
                       value="<?php echo htmlspecialchars($userName); ?>">
                <br>
                
            <!--email-->
                <?php if (!empty($errorEmail)) {
                    ?><p class="error"><?php echo htmlspecialchars($errorEmail); 
                } ?>
                <br>
                
                <label>Email Address</label><br>
                <input type="text" name="email"
                       value="<?php echo htmlspecialchars($email); ?>">
                <br>
                
            <!--password-->
                <?php if (!empty($errorPassword)) {
                    ?><p class="error"><?php echo htmlspecialchars($errorPassword); 
                } ?>
                <br>
                
                <label>Password</label><br>
                <input type="text" name="password"
                       value="<?php echo htmlspecialchars($password); ?>">
                <br><br
            
            <!--register button-->
            <input type="submit" value="Register New User">
            
        </form>
        
        
        
        
    </body>

