<?php include '../views/partials/header.php' ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="public/assets/movie.css">  
</head>
<body>
<header>
        <div class="movin">
            <a href="<?= URL ?>home">Mov'In</a>
        </div>
    </header>
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
                    <h3>Casting</h3>
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
        <?php 
            if(isset($succes)): ?>
                <div class="alert alert-success">
                    <p><?= $succes ?></p>
                </div>
            <?php endif;
            if(!empty($errors)):
                foreach ($errors as $error): ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="alert alert-danger">
                                <p><?= $error ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach;
            endif; 
        ?>
        <form action="#" method="post">
            <label for="author">Pseudo :</label>
            <br>
            <input class="text" type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>" >
            <br>
            <label for="comment">Comment :</label>
            <br>
            <textarea name="comment" id="comment" cols="20" rows="5" class="form-control"><?php if(isset($comment)) echo $comment ?></textarea>
            <br>
            <button type="submit" class="btn btn-success">Send</button>
        </form>
        <div class="movie_comments">
            <?php foreach ($comments as $comment): ?>
                <div class="comments_text">
                    <h3><?= $comment->author ?></h3>
                    <time><?= $comment->date ?></time>
                    <p><?= $comment->comment ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="recommandations">
        <h3>Recommandations</h3>
        <span>Here are some recommandations</span>
        <div class="posters">
            <?php for ($i=0; $i <= 3; $i++) : ?>
                <div class="poster">
                    <img  src="<?= $recommandations[$i] ?>" alt="Recommandation poster">
                </div>
            <?php endfor; ?>
        </div>
    </div>

