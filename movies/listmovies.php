<!DOCTYPE html>
<html>
    <?php// include 'view\header.php'?>
    <body>
        
        <h1>Movie Database</h1>
        <br>
        <table>
            <tr>
                <th>Title</th>
                <th>Genre</th>
                <th>Rating</th>
            </tr>
            
            <?php foreach ($movies as $movie) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($movie->getMovieName()); ?></td>
                    <td><?php echo htmlspecialchars($movie->getMovieGenre()); ?></td>
                    <td><?php echo htmlspecialchars($movie->getMovieRating()); ?></td>
                    <!--button to view movie page -->
                    <td>
                        <form action="-..\index.php" method="post">
                            <input type="hidden" name="action" value="display_movies">
                            <input type="hidden" name="movieID" value="<?php echo htmlspecialchars($movie->getMovieID()); ?>">
                            <input type="submit" value="more details">
                        </form> 
                    </td>
                    
                    
            <?php endforeach; ?>
        </table>
        
        
        
        
    </body>
</html>