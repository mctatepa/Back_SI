<h1>Home</h1>

<form action="#" method="post">
    <input type="text" name="movie" placeholder="Movie" value="<?= $movie ?>">
    <input type="submit">
</form>

<div>
    <?php foreach ($result->results as $_results):?>
        <div class="title"><?= $_results->title ?></div>
    <?php endforeach; ?>
</div>

<div class="big-container">
    <div class="line-container">
        <?php foreach ($result->results as $_results):
            $path = $_results->poster_path;
            $title = $_results->title;
            $overview = $_results->overview;
            $release = $_results->release_date;
            $url_image = "http://image.tmdb.org/t/p/w300/$path";  
        ?>

        <div class="movies-infos">
            <img src=<?=$url_image?> alt="what">
            
            <div class="infos">
                <div><?= $title ?></div>
                <div><?= $overview ?></div>
                <div><?= $release ?></div>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>

<?php foreach ($result->results as $_results):
    $path = $_results->poster_path;
    $title = $_results->title;
    $overview = $_results->overview;
    $release = $_results->release_date;
    $url_image = "http://image.tmdb.org/t/p/w300/$path";  
?>
<?php endforeach; ?>

<article>
    <h3>Article 1</h3>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae laudantium cupiditate veritatis explicabo aliquid ratione cumque, tempora itaque laboriosam repellendus ad, quidem ipsam, voluptate vel? Explicabo laborum eos quisquam aliquid.</p>
    <a href="article/1">Read more</a>
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