<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="main.css"
    </head>
  <?php include 'view\header.php';
  $image = "image/default.png "?> 
    <body>
        <div class="container">
        <h1 class='text-orange'>Internet Movie Database</h1>
        <br>
        
<!--        <div class="carousel slide" data-ride="carousel" data-interval="600">
            <div class="carousel-inner">
                <?php// $counter = 1;
                //foreach ($movieImages as $movieImage) :
                ?>
                    <div class="item <?php// if($counter <=3){echo ' active'; } ?>">
                        <a href="">
                            <img data-src="<?php //$movieImage->getFilePath(); ?>">
                        </a>
                    </div>
                <?php
                //$counter++;
                //endforeach; ?>
            <a class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>-->
             
        <!-- card deck -->
        <h3 class="text-orange">Staff Picks</h3>
        <div class="row row-cols-1 row-cols-md-5 text-center">
            <div class="col h-25">
                <div class="card text-white bg-dark" width="12em">
                    <a href="?action=movie_page&movieID=10"><img class="card-img-top" src="image/619536e1c97173.45372937.jpg" width="20" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title">Shaun of the Dead</h5>
                        <p class="card-text">Classic horror-comedy staring Simon Pegg</p>
                    </div>
                </div>
            </div>
            <div class="col h-25">
                <div class="card text-white bg-dark">
                    <a href="?action=movie_page&movieID=3"><img class="card-img-top" src="image/6189baa0a20ba6.15712129.jpg" width="20" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title">Hot Fuzz</h5>
                        <p class="card-text">A great action-comedy movie Staring Simon Pegg</p>
                    </div>
                </div>
            </div>
            <div class="col h-25">
                <div class="card text-white bg-dark">
                    <a href="?action=movie_page&movieID=6"><img class="card-img-top" src="image/6195363a4a2cb7.33053767.jpg" width="20" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title">Goodfellas</h5>
                        <p class="card-text">Mafia thriller stating Robert De Niro</p>
                    </div>
                </div>
            </div>
            <div class="col h-25">
                <div class="card text-white bg-dark">
                    <a href="?action=movie_page&movieID=5"><img class="card-img-top" src="image/6195364bb0a3a4.89848135.jpg" width="20" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title">Avengers</h5>
                        <p class="card-text">Action movie staring Robert Downy Jr</p>
                    </div>
                </div>
            </div>
            <div class="col h-25">
                <div class="card text-white bg-dark">
                    <a href="?action=movie_page&movieID=4"><img class="card-img-top" src="image/6189bb3c2ae1c3.09731291.jpg" width="20" alt="Card image cap"></a>
                    <div class="card-body">
                        <h5 class="card-title">Forrest Gump</h5>
                        <p class="card-text">Comedy drama staring Tom Hanks</p>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <ul>
            <?php if (!isset($_SESSION['verifiedUser'])) {?>
                <li><a href="?action=user_register" class="text-white">Register</a></li>
                <li><a href="?action=login_user" class="text-white">login</a></li>
             <?php } ?>
             <?php if (isset($_SESSION['verifiedUser']) && $acctype[0] === 'Admin') {?>
                <li><a href="?action=add_movie" class="text-white">Add a movie to the database</a></li>
                <li><a href="actors?action=add_actor" class="text-white">Add an Actor to the database</a></li>
            <?php } ?>
                <li><a href="?action=display_movies" class="text-white">view movie database</a></li>
                
                <li><a href="actors?action=list_actors" class="text-white">View actor database</a></li>
        </ul>
        
        <?php if (isset($_SESSION['verifiedUser'])) 
        {?>
            <p class="text-orange">Welcome, <?php echo $_SESSION['verifiedUser']; ?>!</p>
            <a class='text-white' href="?action=logout">logout</a>
        <?php } ?>
        
        </div>
    </body>
</html>
