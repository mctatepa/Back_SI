<link rel="stylesheet" href="<?= URL ?>assets/style.css">
</head>
<body>
    <header>
        <div class="movin">
            <a href="<?= URL ?>home.php">Move'In</a>
        </div>
    </header>
,

<form action="#" method="post">
    <input type="text" name="movie" placeholder="Choose a movie sir !" value="<?= $movie ?>" class="text">
    <input type="submit" class="submit">
</form>

<div class="big-container">
    <div class="results">Your results :</div>
    <div class="line-container">
        <?php foreach ($result->results as $_results):
            $movie_id += 1;
            $path = $_results->poster_path;
            $title = $_results->title;
            if (!empty($_results->overview)) {
                $overview = $_results->overview;
               }
               else{
                 $overview = "Plus d'info sur la page";
               }
               if (!empty($path)) {
                $url_image = "http://image.tmdb.org/t/p/w300/$path";
               }
            else {
                $url_image = "./public/assets/images/poster_placeholder.png";
            }
        ?>
        <div class="movies-infos">
            <img class="poster" src=<?=$url_image?> alt="what">
            
            <div class="infos">
            <?php $title_url = urlencode($title);
            $movie_url = "movie&movie_name=$title_url&id=$tmdbId[$movie_id]";
            ?>
                <h2 class="title"><?= $title ?></h2>
                <div class="overview"><?= $overview ?></div>
                <a href=<?= $movie_url ?>>test</a>
            </div>
        </div>
 :
        <?php endforeach; ?>
    </div>
</div>

