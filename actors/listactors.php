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
            <input class="btn btn-warning" type="submit" value="submit">
        </form>
        <br>
        <table class='table'>
            <tr>
                <thead class='thead-dark'>
                <th class='text-white'>ActorName</th>
                <th></th>
                </thead>
            </tr>
            
            <?php foreach ($actors as $actor) :
                $imageActor = imageDB::getImagesWithActorID($actor->getActorID());
            if (empty($imageActor)) {
                $actualImage[0] = "../image/default.png";
            } else if ($imageActor === null) {
                $actualImage[0] = '../image/default.png';
            } else {
            $actualImage = $imageActor[0];
            }
            ?>
                <tr>
                    <td class='text-white'><h3><a class='text-white' href="index.php?action=actor_page&actorID=<?php echo htmlspecialchars($actor->getActorID());?>"><?php echo htmlspecialchars($actor->getActorFullName()); ?></td></a></h3>
                    <!--button to view actor page -->
                    
                    
                    <td>
                        <image src='<?php echo $actualImage[0] ?>' style="height: 80px; width: 60px;">
                        
                    </td>
                    
                    
                   <!-- <td>
                        <form action="index.php" method="get">
                            <input type="hidden" name="action" value="actor_page">
                            <input type="hidden" name="actorID" value="<?php echo htmlspecialchars($actor->getActorID()); ?>">
                            <input type="submit" value="more details">
                        </form> 
                    </td>-->
                    
                    
            <?php endforeach; ?>
        </table>
        
        
        
        </div>
    </body>
    <?php include '..\view\footer.php'; ?>
</html>

