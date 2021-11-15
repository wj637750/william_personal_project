<!DOCTYPE html>
<html>
    <?php include '..\view\header.php'?>
    <body>
        
        <h1><a href="?action=list_actors">Actor Database</a></h1>
        <br>
        <form action="index.php" method="get">
            <label>Search Movies</label>
            <input type="hidden" name="action" value="search_actors">
            <input type="text" name="search">
            <input type="submit" value="submit">
        </form>
        <br>
        <table>
            <tr>
                <th>ActorName</th>
            </tr>
            
            <?php foreach ($actors as $actor) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($actor->getActorFullName()); ?></td>
                    <!--button to view actor page -->
                    <td>
                        <form action="index.php" method="get">
                            <input type="hidden" name="action" value="actor_page">
                            <input type="hidden" name="actorID" value="<?php echo htmlspecialchars($actor->getActorID()); ?>">
                            <input type="submit" value="more details">
                        </form> 
                    </td>
                    
                    
            <?php endforeach; ?>
        </table>
        
        
        
        
    </body>
</html>

