<!DOCTYPE html>
<html>
    <?php// include 'view\header.php'   ?>
    <body>
        <h1> <?php echo htmlspecialchars($actor->getActorFullName());; ?></h1>
        <table>
            <tr>
                <th>Actor bio</th>
            </tr>
            
            <tr>
                <td><?php echo htmlspecialchars($actor->getActorBio()); ?></td>
            </tr>
        </table>
        
        <form action="index.php" method="post" id="link_movie">
            <input type="hidden" name="action" value="link_movie" />
            <input type="hidden" name="actorID" value="<?php echo htmlspecialchars($actor->getActorID()); ?>">
            <input type="submit" value="add a movie to this actor.">
        </form>
        
        
    </body>
</html>
        
        