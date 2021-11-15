<!DOCTYPE html>
<html>
    <?php include 'view\header.php'?>
    <body>
        <div class='container'>
            <h1 ><a href="?action=display_movies" class='text-orange'>Movie Database</a></h1>
            <br>
            <!-- search bar -->
            <form action="index.php" method="get">
                <label class='text-orange'>Search Movies</label>
                <input type="hidden" name="action" value="search_movies">
                <input type="text" name="search">
                <input type="submit" value="submit">
            </form>
            <br>

            <table>
                <tr>
                    <th class='text-white'>Title</th>
                    <th class='text-white'>Genre</th>
                    <th class='text-white'>Rating</th>
                </tr>

                <?php foreach ($movies as $movie) : ?>
                    <tr>
                        <td class='text-white'><?php echo htmlspecialchars($movie->getMovieName()); ?></td>
                        <td class='text-white'><?php echo htmlspecialchars($movie->getMovieGenre()); ?></td>
                        <td class='text-white'><?php echo htmlspecialchars($movie->getMovieRating()); ?></td>
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
        
        
        
        </div>
    </body>
</html>