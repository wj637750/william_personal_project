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
                <input class="btn btn-warning" type="submit" value="submit">
            </form>
            <br>

            <table class="table">
                <tr>
                <thead class="thead-dark">
                    
                    <th class='text-white'>Title</th>
                    <th class='text-white '>Genre</th>
                    <th class='text-white'>Rating</th>
                    
                </thead>
                </tr>

                <?php foreach ($movies as $movie) : ?>
                    <tr>
                        
                        <td class='text-white'><a class='text-white' href="?action=movie_page&movieID=<?php echo htmlspecialchars($movie->getMovieID());?>"><?php echo htmlspecialchars($movie->getMovieName()); ?></a></td>
                        <td class='text-white'><?php echo htmlspecialchars($movie->getMovieGenre()); ?></td>
                        <td class='text-white'><?php echo htmlspecialchars($movie->getMovieRating()); ?></td>
                        <!--button to view movie page 
                        <td>
                            <form action="index.php" method="get">
                                <input type="hidden" name="action" value="movie_page">
                                <input type="hidden" name="movieID" value="<?php echo htmlspecialchars($movie->getMovieID()); ?>">
                                <input type="submit" value="more details">
                            </form> 
                        </td> -->


                <?php endforeach; ?>
        </table>
        
        
        
        </div>
    </body>
    <?php include 'view\footer.php'; ?>
</html>