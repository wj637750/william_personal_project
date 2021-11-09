<!DOCTYPE html>
<html>
    <?php// include 'view\header.php'   ?>
    <body>
        <h1> <?php echo htmlspecialchars($actor->getActorFullName());; ?></h1>
        
        <?php if (!empty($errorActorPageImage)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorActorPageImage);
                } ?> 
         <br>
        <img src='<?php echo $actualImage[0] ?>' width='100' height = '150'>
        <br><br>
        
         <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="upload_image"/>
                <input type="file" name="image" /> <br>
                <input type="submit" value="Change profile pic"/>
            </form>
        
        <table>
            <tr>
                <th>Actor bio</th>
            </tr>
            
            <tr>
                <td><?php echo htmlspecialchars($actor->getActorBio()); ?></td>
            </tr>
        </table><br><br>
        
        <h3>Movies involving this actor!</h3>
        <table>
            <tr>
                <th>Movie</th>
            </tr>
            
            <?php foreach ($movies as $movie) : ?>
            <tr>
                <td><?php echo htmlspecialchars($movie->getMovieName()); ?></td>
                    <?php $roles = movieDB::getRoleByActor($_SESSION['actorID'], $movie->getMovieID()); 
                    foreach ($roles as $role) : ?>
                        <td><?php echo htmlspecialchars($role->getRole()); ?></td>
                        <?php var_dump($role) ?>
                    <?php endforeach; ?>
                <td>
                    <form action="..\index.php" method="post">
                        <input type="hidden" name="action" value="movie_page">
                        <input type="hidden" name="movieID" value="<?php echo htmlspecialchars($movie->getMovieID()); ?>">
                        
                        <input type="submit" value="more details">
                    </form> 
                </td>
            </tr>
            <?php endforeach; ?>
        </table><br><br>
        
        
        
        <form action="index.php" method="post" id="link_movie">
            <input type="hidden" name="action" value="link_movie" />
            <input type="hidden" name="actorID" value="<?php echo htmlspecialchars($actor->getActorID()); ?>">
            <input type="submit" value="add a movie to this actor.">
        </form>
        
        
    </body>
</html>
        
        