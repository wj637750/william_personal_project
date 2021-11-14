<!DOCTYPE html>
<html>
    <?php// include 'view\header.php'?>
    <body>
        <h1>Movie page for <?php echo htmlspecialchars($movie->getMovieName()); ?></h1>
    
        <?php if (!empty($errorMoviePageImage)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorMoviePageImage);
                } ?> 
         <br>
                
        <img src='<?php echo $actualImage[0] ?>' width='100' height = '150'>
        <br><br>
        
        <?php if (isset($_SESSION['verifiedUser']) && $acctype[0] === 'Admin') {?>
         <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="upload_movie_image"/>
                <input type="file" name="image" /> <br>
                <input type="submit" value="Change profile pic"/>
            </form>
        <?php } ?>
        <br>
        <br>
        <h3>Reviews left for this movie</h3>
        <br>
        <table>
            <tr>
                <th>Review</th>
                <th>Left by</th>
                <th>Date</th>
            </tr>
            <?php foreach ($comments as $comment) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($comment->getComment()); ?></td>
                    <td><?php echo htmlspecialchars(userDB::retrieveUserName($comment->getSendingId())); ?></td>
                    <td><?php echo htmlspecialchars($comment->getLeftWhen()); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        
        <?php if (isset($_SESSION['verifiedUser'])) {?>
            <br><br>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="leaveComment" />
                <input type="text" name="comment" />
                <br>
                <input type="submit" value="Leave a Comment">
            </form>
        <?php } ?>
        <?php if (!isset($_SESSION['verifiedUser'])) {?>
            <p>Please login to leave a review.</p>
        <?php } ?>
        
        
    </body>
</html>

