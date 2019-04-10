<form action="#" method="post">
    <input type="text" name="movie" placeholder="Choose a movie sir !" value="<?= $movie ?>" class="text">
    <input type="submit" class="submit">
</form>

<div class="big-container">
    <div class="results">Your results :</div>
    <div class="line-container">
        <?php foreach ($result->results as $_results):
            $path = $_results->poster_path;
            $title = $_results->title;
            $overview = $_results->overview;
            $url_image = "http://image.tmdb.org/t/p/w300/$path";  
        ?>

        <div class="movies-infos">
            <img src=<?=$url_image?> alt="what">
            
            <div class="infos">
<<<<<<< HEAD
                <div class="title"><?= $title ?></div>
                <div class="overview"><?= $overview ?></div>
                <a href="oui.php" class="see-more">See more :</a>
=======
            <?php $movie_url = "movie=$title";
            ?>
                <div><?= $title ?></div>
                <div><?= $overview ?></div>
                <div><?= $release ?></div>
                <a href=<?= urlencode($movie_url) ?>>test</a>
>>>>>>> e8071312a926c9edf9066c29523d6de73163d603
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>

<<<<<<< HEAD
=======
<?php foreach ($result->results as $_results):
    $path = $_results->poster_path;
    $title = $_results->title;
    $overview = $_results->overview;
    $release = $_results->release_date;
    $url_image = "http://image.tmdb.org/t/p/w300/$path";
?>
<?php endforeach; ?>
<article>
    <h3>Movie page</h3>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae laudantium cupiditate veritatis explicabo aliquid ratione cumque, tempora itaque laboriosam repellendus ad, quidem ipsam, voluptate vel? Explicabo laborum eos quisquam aliquid.</p>
</article>

<article>
    <h3>Article 2</h3>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde, nam necessitatibus deserunt obcaecati similique tempore impedit, provident tenetur quos laboriosam, distinctio adipisci. Architecto repudiandae inventore hic pariatur tenetur veritatis delectus.</p>
    <a href="article/2">Read more</a>
</article>

<article>
    <h3>Article 3</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis corrupti officiis esse doloremque necessitatibus ut voluptate, ea, pariatur atque adipisci iure quia iusto aspernatur et asperiores quo veniam quasi libero!</p>
    <a href="article/3">Read more</a>
</article>
>>>>>>> e8071312a926c9edf9066c29523d6de73163d603
