<!DOCTYPE html>
<html>
    <?php include '..\view\header.php'?>
    <body>
        <div class='container'>
        <h1><a href="?action=list_actors" class='text-orange'>Actor Database</a></h1>
        <br>
        <form action="index.php" method="get">
            <label class='text-orange'>Search Movies</label>
            <input type="hidden" name="action" value="search_actors">
            <input type="text" name="search">
            <input type="submit" value="submit">
        </form>
        <br>
        <table>
            <tr>
                <th class='text-orange'>ActorName</th>
            </tr>
            
            <?php foreach ($actors as $actor) : ?>
                <tr>
                    <td class='text-white'><?php echo htmlspecialchars($actor->getActorFullName()); ?></td>
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
        
        
        
        </div>
    </body>
</html>

