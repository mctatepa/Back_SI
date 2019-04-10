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
            <?php $movie_url = "movie=$title";
            ?>
                <div><?= $title ?></div>
                <div><?= $overview ?></div>
                <a href=<?= urlencode($movie_url) ?>>test</a>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>

