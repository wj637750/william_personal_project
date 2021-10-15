<!DOCTYPE html>
<html>
    <?php// include 'view\header.php'?>
    <body>
        
        <form action="index.php" method="post" id="confirm_movie">
               <input type="hidden" name="action" value="confirm_movie" />
            
            <!--movie name-->
                <?php if (!empty($errorMovieName)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorMovieName);
                } ?> <br>
                
                <label>Movie Title</label><br>
                <input type="text" name="movieName"
                       value="<?php echo htmlspecialchars($movieName); ?>">
                <br>
                
            <!--movie genre-->
                <?php if (!empty($errorGenre)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorGenre);
                } ?> <br>
        
                <label>Movie Genre</label><br>
                <select name="movieGenre" type="text">;
                <?php $genre=array('comedy', 'horror', 'action', 'romance', 'drama');
                
                foreach($genre as $key => $value){
                    echo' <option value="'.$value.'">'.$value.'</option>';
                }
                ?></select><br><br>
            
            <!-- movie rating -->
            <?php if (!empty($errorRating)) {
                echo htmlspecialchars($errorRating);
            } ?> <br>

            <label>Move Rating</label><br>
            <input type="text" name="movieRating"
                   value="<?php echo htmlspecialchars($movieRating); ?>">
            <br><br>
            <!-- submit -->
            <input type='submit' value='Enter Movie'>
            
        </form>
        
        
        
    </body>
    
