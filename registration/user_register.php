<!DOCTYPE html>
<html>
    <?php include 'view\header.php'?>
    <body>
        <div class='container'>
        <h1 class="text-orange">Registration</h1>
        
        <form action="index.php" method="post" id="confirm_user">
            <input type="hidden" name="action" value="confirm_user" />
            
            <!--first name-->
                <?php if (!empty($errorFName)) {
                    ?> <p class="text-orange"> <?php echo htmlspecialchars($errorFName);
                } ?> <br>
                
                <label class='text-white'>First Name</label><br>
                <input type="text" name="firstName"
                       value="<?php echo htmlspecialchars($firstName); ?>">
                <br>
                
            <!--last name-->
                <?php if (!empty($errorLName)) {
                    ?> <p class="text-orange"> <?php echo htmlspecialchars($errorLName);    
                } ?> 
                <br>
                
                <label class='text-white'>Last Name</label><br>
                <input type="text" name="lastName"
                       value="<?php echo htmlspecialchars($lastName); ?>">
                <br>
                
            <!--user name-->
                <?php if (!empty($errorUser)) {
                    ?><p class="text-orange"><?php echo htmlspecialchars($errorUser);
                } ?>
                <br>
                
                <label class='text-white'>Username</label><br>
                <input type="text" name="username"
                       value="<?php echo htmlspecialchars($userName); ?>">
                <br>
                
            <!--email-->
                <?php if (!empty($errorEmail)) {
                    ?><p class="text-orange"><?php echo htmlspecialchars($errorEmail); 
                } ?>
                <br>
                
                <label class='text-white'>Email Address</label><br>
                <input type="text" name="email"
                       value="<?php echo htmlspecialchars($email); ?>">
                <br>
                
            <!--password-->
                <?php if (!empty($errorPassword)) {
                    ?><p class="text-orange"><?php echo htmlspecialchars($errorPassword); 
                } ?>
                <br>
                
                <label class='text-white'>Password</label><br>
                <input type="text" name="password"
                       value="<?php echo htmlspecialchars($password); ?>">
                <br><br
            
            <!--register button-->
            <input type="submit" value="Register New User">
            
        </form>
        
        
        
        </div>
    </body>
    <?php include 'view\footer.php'; ?>
</html>

