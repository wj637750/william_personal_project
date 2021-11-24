<!DOCTYPE html>
<html>
    <?php include 'view\header.php'?>
    <body>
        <div class='container'>
        
        <form action="index.php" method="post" id="confirm_movie">
               <input type="hidden" name="action" value="confirm_movie" />
            
               <h1 class='text-orange'>Enter a Movie</h1>
            <!--movie name-->
                <?php if (!empty($errorMovieName)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorMovieName);
                } ?> <br>
                
                <label class='text-orange'>Movie Title</label><br>
                <input type="text" name="movieName" placeholder='Title'
                       value="<?php echo htmlspecialchars($movieName); ?>">
                <br>
                
            <!--movie genre-->
                <?php if (!empty($errorGenre)) {
                    ?> <p id="error"> <?php echo htmlspecialchars($errorGenre);
                } ?> <br>
        
                <label class='text-orange'>Movie Genre</label><br>
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

            <label class='text-orange'>Move Rating</label><br>
            <input type="number" name="movieRating" placeholder='Rating'
                   value="<?php echo htmlspecialchars($movieRating); ?>">
            <br><br>
            <!-- submit -->
            <input type='submit' class='btn btn-primary' value='Enter Movie'>
            
        </form>
        
        
        </div>
        <?php include 'view\footer.php'; ?>
    </body>
    
