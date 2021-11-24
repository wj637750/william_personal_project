<!DOCTYPE html>
<html>
    <?php include '..\view\header.php'?>
    <body>
        <div class='container'>
        <h1 class='text-orange'> <?php echo htmlspecialchars($actor->getActorFullName());; ?></h1>
        
        <?php if (!empty($errorActorPageImage)) {
                    ?> <p class='text-orange' id="error"> <?php echo htmlspecialchars($errorActorPageImage);
                } ?> 
         <br>
        <img src='<?php echo $actualImage[0] ?>' width='100' height = '150'>
        <br><br>
        
        <?php if (isset($_SESSION['verifiedUser']) && $acctype[0] === 'Admin') {?>
         <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="upload_image"/>
                <input class='text-white' type="file" name="image" /> <br>
                <input type="submit" value="Change profile pic"/>
            </form>
        <?php } ?>
        <table>
            <tr>
                <th class='text-orange'>Actor bio</th>
            </tr>
            
            <tr>
                <td class='text-white'><?php echo htmlspecialchars($actor->getActorBio()); ?></td>
            </tr>
        </table><br><br>
        
        <h3 class='text-orange'>Movies involving this actor!</h3>
        <table class='table'>
            <tr>
                <th class='text-orange'>Movie</th>
                <th class='text-orange'>Role</th>
            </tr>
            
            <?php foreach ($movies as $movie) : ?>
            <tr>
                <td class='text-white'><h4><a class='text-white' href="..\?action=movie_page&movieID=<?php echo htmlspecialchars($movie->getMovieID());?>"><?php echo htmlspecialchars($movie->getMovieName()); ?></td></a></h4>
                    
                    
                    <?php $role = roleDB::retrieveRoleByActorAndMovie($_SESSION['actorID'], $movie->getMovieID()); 
                          //foreach ($roles as $role) : ?>
                            <td class='text-white'><?php echo htmlspecialchars($role[0]); ?></td>
                            
                    <?php //endforeach; ?>
                        
                <!--<td>
                    <form action="..\index.php" method="get">
                        <input type="hidden" name="action" value="movie_page">
                        <input type="hidden" name="movieID" value="<?php echo htmlspecialchars($movie->getMovieID()); ?>">
                        
                        <input type="submit" value="more details">
                    </form> 
                </td>-->
                        
            </tr>
            <?php endforeach; ?>
        </table><br><br>
        
        
        <?php if (isset($_SESSION['verifiedUser']) && $acctype[0] === 'Admin') {?>
        <form action="index.php" method="post" id="link_movie">
            <input type="hidden" name="action" value="link_movie" />
            <input type="hidden" name="actorID" value="<?php echo htmlspecialchars($actor->getActorID()); ?>">
            <input type="submit" value="add a movie to this actor.">
        </form>
        <?php } ?>
        
        </div>
    </body>
    <?php include '..\view\footer.php'; ?>
</html>
        
        