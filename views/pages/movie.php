<?php include '../views/partials/header.php' ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="public/assets/movie.css">  
</head>
<body>
    <div class="movie_details">
        <img src=<?= $img_url ?>  alt="" class="poster">
        <div class="details">
            <div class="title">
                <h2><?= $movie ?></h2>
                <span class="date"><?= $Date?></span>
            </div>
            <div class="gender">
                <?php foreach ($Genres as $_Genres):
                    $gender = $_Genres
                ?>
                <div class="gender_style">
                    <span><?= $gender ?></span>
                </div>
                <?php endforeach ?>
            </div>
            <div class="synopsis">
                <h3>Synopsis</h3>
                <p><?= $Plot ?></p>
            </div>
            <div class="cast">
                <div class="actors">
                    <h3>Actors</h3>
                    <div class="actor_list">
                            <span><?= $Actors ?></span>
                    </div>
                </div>
                <div class="director">
                    <h3>Director</h3>
                    <span><?= $Director ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="rating_location">
        <div class="ratings">
            <div class="average">
                <h3>Ratings</h3>
                <div class="average_score">
                    <span><?= $average_grade?></span>
                </div>
            </div>
            <div class="rating_detail">
                <div class="rating_row row1">
                    <div class="logo"><img src="public/assets/images/IMDB.png" alt=""></div>
                    <span class="title">IMDB :</span>
                    <span class="score"><?= $imdb_grade ?></span>
                </div>
                <div class="rating_row row2">
                    <div class="logo"><img src="public/assets/images/tomatoes.png" alt=""></div>
                    <span class="title">Rotten tomatoes :</span>
                    <span class="score"><?= $rotten_grade ?></span>
                </div>
                <div class="rating_row row3">
                    <div class="logo"><img src="public/assets/images/allocine.png" alt=""></div>
                    <span class="title">Allocine :</span>
                    <span class="score"><?= $allocine_grade ?></span>
                </div>
                <div class="rating_row row4">
                    <div class="logo"><img src="public/assets/images/metacritic.png" alt=""></div>
                    <span class="title">Metacritic :</span>
                    <span class="score"><?= $metascore_grade ?></span>
                </div>
            </div>
        </div>
        <div class="location">
            <h3>Where to find it</h3>
            <div class="locations">
                <?php foreach ($locations as $_locations):
                        $location = $_locations->display_name
                    ?>
                    <div class="locations_name">
                        <span><?= $location ?></span>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="comments">
        <h3>Comments</h3>
        <form action="#" method="post">
            <label for="author">Pseudo :</label>
            <br>
            <input class="text" type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>" >
            <br>
            <label for="comment">Commentaire :</label>
            <br>
            <textarea name="comment" id="comment" cols="20" rows="5" class="form-control"><?php if(isset($comment)) echo $comment ?></textarea>
            <br>
            <button type="submit" class="btn btn-success">Envoyer</button>
        </form>
    </div>

<?php include '../views/partials/footer.php' ?>