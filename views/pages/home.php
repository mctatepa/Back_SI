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
                <div class="title"><?= $title ?></div>
                <div class="overview"><?= $overview ?></div>
                <a href="oui.php" class="see-more">See more :</a>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>

