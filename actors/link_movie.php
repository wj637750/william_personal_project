<!DOCTYPE html>
<html>
    <?php include '..\view\header.php'?>
    <body>
        <div class='container'>
        <h1 class='text-orange'>Add movie to actor</h1>
        <br>
        <table>
            <tr>
                <th class='text-white'>Title</th>
                <th class='text-white'>Role<th>
            </tr>
            
            <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td class='text-white'><?php echo htmlspecialchars($movie->getMovieName()); ?></td>
                    <!--button to select movie  -->
                    <td>
                        <form action="index.php" method="post" id="link_actor">
                            <input type="hidden" name="action" value="link_actor">
                            
                            <input type="text" name="actorRole">
                                <br>
                            <input type="hidden" name="movieID" value="<?php echo htmlspecialchars($movie->getMovieID()); ?>">
                            <input type="submit" value="Select this movie">
                        </form> 
                    </td>
                    
                    
            <?php endforeach; ?>
        </table>
        
        
        
        </div>
    </body>
    <?php include '..\view\footer.php'; ?>
</html>