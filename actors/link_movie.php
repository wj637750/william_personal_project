<!DOCTYPE html>
<html>
    <?php include '..\view\header.php'?>
    <body>
        <div class='container'>
        <h1 class='text-orange'>Add movie to actor</h1>
        
        <?php if (!empty($errorRole)) {
                        echo htmlspecialchars($errorRole);
        } ?> <br>
                    
        
        <table class='table'>
            <tr>
                <th class='text-orange'>Title</th>
                <th class='text-orange'>Role<th>
            </tr>
            
            <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td class='text-white'><?php echo htmlspecialchars($movie->getMovieName()); ?></td>
                    <!--button to select movie  -->
                    
                    
                    <td>
                        <form action="index.php" method="post" id="link_actor">
                            <input type="hidden" name="action" value="link_actor">
                            
                            <input type="text" name="actorRole">
                            </td>
                            <td>
                            <input type="hidden" name="movieID" value="<?php echo htmlspecialchars($movie->getMovieID()); ?>">
                            <input class="btn btn-warning" type="submit" value="Select this movie">
                        </form> 
                    </td>
                    
                    
            <?php endforeach; ?>
        </table>
        
        
        
        </div>
    </body>
    <?php include '..\view\footer.php'; ?>
</html>