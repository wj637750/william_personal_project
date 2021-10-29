<!DOCTYPE html>
<html>
    <?php// include 'view\header.php'?>
    <body>
        
        <form action="index.php" method="post" id="confirm_actor">
            <input type="hidden" name="action" value="confirm_actor" />
            
            <!--actor name-->
                <?php if (!empty($errorActorName)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorActorName);
                } ?> <br>
                
                <label>Actor First Name</label><br>
                <input type="text" name="actorFirstName"
                       value="<?php echo htmlspecialchars($actorFirstName); ?>">
                <br>
                
                <?php if (!empty($errorActorLastName)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorActorLastName);
                } ?> <br>
                
                <label>Actor Last Name</label><br>
                <input type="text" name="actorLastName"
                       value="<?php echo htmlspecialchars($actorLastName); ?>">
                <br>
                
            <!--actor Bio-->
                <?php if (!empty($errorBio)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorBio);
                } ?> <br>
                
                <label>Please write a short biography for this actor</label><br>
                <textarea name="actorBio"
                       value="<?php echo htmlspecialchars($actorBio); ?>">
                </textarea>
                <br><br>
            
            <!-- submit -->
                <input type='submit' value='Enter Actor'>
            
        </form>
    </body>
</html>

