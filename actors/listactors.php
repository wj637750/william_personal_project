<!DOCTYPE html>
<html>
    <?php// include 'view\header.php'?>
    <body>
        
        <h1>Actor Database</h1>
        <br>
        <table>
            <tr>
                <th>ActorName</th>
                <th>Bio</th>
            </tr>
            
            <?php foreach ($actors as $actor) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($actor->getActorFullName()); ?></td>
                    <td><?php echo htmlspecialchars($actor->getActorBio()); ?></td>
                    <!--button to view actor page -->
                    <td>
                        <form action="index.php" method="post">
                            <input type="hidden" name="action" value="actor_page">
                            <input type="hidden" name="actorID" value="<?php echo htmlspecialchars($actor->getActorID()); ?>">
                            <input type="submit" value="more details">
                        </form> 
                    </td>
                    
                    
            <?php endforeach; ?>
        </table>
        
        
        
        
    </body>
</html>

