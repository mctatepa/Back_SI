<link rel="stylesheet" href="<?= URL ?>assets/reset.css">
<link rel="stylesheet" href="<?= URL ?>assets/style.css">
</head>
<body>
    <header>
        <div class="movin">
            <a href="<?= URL ?>home.php">Move'In</a>
        </div>
    </header>

<form action="#" method="post" class="form">
    <input type="text" name="movie" value="<?= $movie ?>" class="text" id="movie-input" autofocus="true">
    <img src="./public/assets/images/search_off.png" alt="#" id="off">
    <div class="solution">
        <a id="on" type="submit">
            <img src="./public/assets/images/search_on.png" alt="#">
            <input type="submit" class="submit">
        </a>
    </div>
</form>




<div class="big-container">
    <div class="results">Your results :</div>
    <div class="line-container">
        <?php foreach ($result->results as $_results):
            $movie_id += 1;
            $path = $_results->poster_path;
            $title = $_results->title;
            $overview = $_results->overview;
            $url_image = "http://image.tmdb.org/t/p/w300/$path";  
        ?>
        <div class="movies-infos">
            <img src=<?=$url_image?> alt="what">
            
            <div class="infos">
                <?php $title_url = urlencode($title);
                $movie_url = "movie&movie_name=$title_url&id=$tmdbId[$movie_id]";
                ?>
                <div><?= $title ?></div>
                <div><?= $overview ?></div>
                <a href=<?= $movie_url ?>>test</a>
            </div>
        </div>
 :
        <?php endforeach; ?>
    </div>
</div>

<script src="./public/assets/script.js"></script>