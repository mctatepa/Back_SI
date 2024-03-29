<link rel="stylesheet" href="<?= URL ?>assets/reset.css">
<link rel="stylesheet" href="<?= URL ?>assets/style.css">
</head>
<body>
    <header>
        <div class="movin">
            <a href="<?= URL ?>home">Mov'In</a>
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
            if (!empty($_results->overview)) {
                $overview = $_results->overview;
                $substr = substr($overview, 0, 650);
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
            
            <div class="align-button">
                <div class="infos">
                    <?php $title_url = urlencode($title);
                    $movie_url = "movie&movie_name=$title_url&id=$tmdbId[$movie_id]";
                    ?>
                    <div class="title"><?= $title ?></div>
                    <div class="overview"><?php $substr; 
                    if (strlen($overview) > 650) {
                        $substr .= "...";
                        echo($substr);
                    } else {
                        echo($overview);
                    }
                    ?></div>
                </div>

                <div class="see-button">
                    <a href=<?= $movie_url ?> class="see-more">Discover</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="./public/assets/script.js"></script>

