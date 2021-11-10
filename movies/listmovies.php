<!DOCTYPE html>
<html>
    <?php// include 'view\header.php'?>
    <body>
        
        <h1><a href="?action=display_movies">Movie Database</a></h1>
        <br>
        <!-- search bar -->
        <form action="index.php" method="get">
            <label>Search Movies</label>
            <input type="hidden" name="action" value="search_movies">
            <input type="text" name="search">
            <input type="submit" value="submit">
        </form>
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
                        <form action="index.php" method="get">
                            <input type="hidden" name="action" value="movie_page">
                            <input type="hidden" name="movieID" value="<?php echo htmlspecialchars($movie->getMovieID()); ?>">
                            <input type="submit" value="more details">
                        </form> 
                    </td>
                    
                    
            <?php endforeach; ?>
        </table>
        
        
        
        
    </body>
</html>