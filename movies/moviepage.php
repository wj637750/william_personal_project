<!DOCTYPE html>
<html>
    <?php include 'view\header.php'?>
    <body>
        <div class="container">
        <div class='row'>
            <div class='col'>
                <h1 class="text-orange"><?php echo htmlspecialchars($movie->getMovieName()); ?></h1>
            </div>
            <div class='col'>
                <h2 class="text-orange"><?php echo htmlspecialchars($movie->getMovieGenre()); ?></h2>
            </div>
            <div class='col'>
                <h2 class="text-orange">Score: <?php echo htmlspecialchars($movie->getMovieRating()); ?>/10</h2>
            </div>
        </div>
            <br>
        <div class='row'>
            <div class='col'>
            <?php if (!empty($errorMoviePageImage)) {
                ?> <p class='text-orange' id="error"> <?php echo htmlspecialchars($errorMoviePageImage);
            }
            ?> 
                <br>

                <img src='<?php echo $actualImage[0] ?>' width='214px' height = '317px'>
                <br><br>

            <?php if (isset($_SESSION['verifiedUser']) && $acctype[0] === 'Admin') { ?>
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="upload_movie_image"/>
                    <input class="text-white" type="file" name="image" /> <br>
                    <input class="btn btn-warning" type="submit" value="Change profile pic"/>
                </form>
                <br>
            <?php } ?>
            </div>
            <div class='col '>
                <table>
                        <tr>
                            <th class='text-orange'>Movie bio</th>
                        </tr>

                        <tr>
                            <td class='text-white'><?php echo htmlspecialchars($movie->getMovieBio()); ?></td>
                        </tr>
                    </table><br><br>
            </div>
            <div class='col'></div>
        </div>
        
        <!-- actor list -->
        <h3 class='text-orange'>Cast</h3>
            <table class='table bg-light table-striped'>
            <thead class='thead-dark'>
                <tr>
                    <th class=''>Actor</th>
                    <th class=''>Role</th>
                </tr>
            </thead>
            
            <?php foreach ($actors as $actor) : ?>
            <tr>
                <td ><h4><a class='' href="actors\?action=actor_page&actorID=<?php echo htmlspecialchars($actor->getActorID());?>"><?php echo htmlspecialchars($actor->getActorFirstName() . ' ' . $actor->getActorActorLastName())   ?></td></a></h4>
                        <?php $role = roleDB::retrieveRoleByActorAndMovie($actor->getActorID(), $_SESSION['otherMovieID']); ?>
                            <td class=''><?php echo htmlspecialchars($role[0]); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <!--*********************************-->
        <br<br>
        
        <h3 class="text-orange">Reviews left for this movie</h3>
        <br>
        <table class='table'>
            <tr>
                <th class="text-orange">Review</th>
                <th class="text-orange">Left by</th>
                <th class="text-orange">Date</th>
            </tr>
            <?php foreach ($comments as $comment) : ?>
                <tr>
                    <td class="text-white"><?php echo htmlspecialchars($comment->getComment()); ?></td>
                    <td class="text-white"><?php echo htmlspecialchars(userDB::retrieveUserName($comment->getSendingId())); ?></td>
                    <td class="text-white"><?php echo htmlspecialchars($comment->getLeftWhen()); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <?php if (isset($_SESSION['verifiedUser'])) {?>
            <br><br>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="leaveComment" />
                <input type="text" name="comment" />
                <br>                 <br>
                <input class="btn btn-warning" type="submit" value="Leave a Comment">
            </form>
        <?php } ?>
        <?php if (!isset($_SESSION['verifiedUser'])) {?>
            <p class="text-orange">Please login to leave a review.</p>
        <?php } ?>
            <br><br>
        </div>
        <br><br><br>
    </body>
    <?php include 'view\footer.php'; ?>
</html>

