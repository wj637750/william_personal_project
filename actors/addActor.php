<!DOCTYPE html>
<html>
    <?php include '..\view\header.php'?>
    <body>
        <div class='container'>
        <form action="index.php" method="post" id="confirm_actor">
            <input type="hidden" name="action" value="confirm_actor" />
            <h1 class='text-orange'>Enter an Actor</h1>
            <!--actor name-->
                <?php if (!empty($errorActorName)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorActorName);
                } ?> <br>
                
                <label class='text-orange'>Actor First Name</label><br>
                <input type="text" name="actorFirstName"
                       value="<?php echo htmlspecialchars($actorFirstName); ?>">
                <br>
                
                <?php if (!empty($errorActorLastName)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorActorLastName);
                } ?> <br>
                
                <label class='text-orange'>Actor Last Name</label><br>
                <input type="text" name="actorLastName"
                       value="<?php echo htmlspecialchars($actorLastName); ?>">
                <br>
                
            <!--actor Bio-->
                <?php if (!empty($errorBio)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorBio);
                } ?> <br>
                
                <label class='text-orange'>Please write a short biography for this actor</label><br>
                <textarea name="actorBio"
                       value="<?php echo htmlspecialchars($actorBio); ?>">
                </textarea>
                <br><br>
            
            <!-- submit -->
                <input type='submit' class='btn btn-primary' value='Enter Actor'>
            
        </form>
        </div>
    </body>
    <?php include '..\view\footer.php'; ?>
</html>

