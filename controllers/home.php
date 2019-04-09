<?php

$title = "Move'in";

// Get movies and use fight club as default
$movie = empty($_POST['movie']) ? 'fight club' : $_POST['movie'];

// Create API url
$movieUrl = 'https://api.themoviedb.org/3/search/movie?';
$movieUrl .= http_build_query([
  'api_key' => '0053c3d101416f34e0b7aba3d389596b',
  'language' => 'fr',
  'query' => urlencode($movie),
  'page' => 1,
]);

// CACHE TMDB

// Create cache info
$cacheKey = $movie;
$cachePath = '../cache/cache_TMDB/'.$cacheKey;
$cacheUsed = false;


if(file_exists($cachePath) && time() - filemtime($cachePath) < (60*60*24))
{
  $result = file_get_contents($cachePath);
  $cacheUsed = true;
}
else{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $movieUrl);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($curl);
  curl_close($curl);

  // Save in cache
  file_put_contents($cachePath, $result);
}
// Show result

    // Decode JSON
    $result = json_decode($result);


//
//  REQUEST IMDB (RAPIDAPI)
//

require_once '../unirest-php-master/src/Unirest.php';

// Creation of the IMDB ID array

$imdbId = [];

// Create cache info
$cacheKey2 = $movie;
$cachePath2 = '../cache/cache_IMDB/'.$cacheKey2;
$cacheUsed2 = false;


if(file_exists($cachePath2) && time() - filemtime($cachePath2) < (60*60*24))
{
  $result2 = file_get_contents($cachePath2);
  $cacheUsed2 = true;
}
else{

  $result2 = Unirest\Request::get("https://movie-database-imdb-alternative.p.rapidapi.com/?s='./$movie/'",
  array(
    "X-RapidAPI-Host" => "movie-database-imdb-alternative.p.rapidapi.com",
    "X-RapidAPI-Key" => "121e39e918mshbaf8ba77d175913p1ec8c6jsnd0dc695e72dd"
  )
);

  $result2 = json_encode($result2);

  // Save in cache
  file_put_contents($cachePath2, $result2);
}
$result2 = json_decode($result2);



$genres = array(
  28  => "Action",
  16 => "Animation",
  35 => "Comedy",
  80 => "Crime",
  99 => "Documentary",
  18 => "Drama",
  10751 => "Family",
  27 => "Horror",
  9648 => "Mystery",
  36 => "History",
  878 => "Science Fiction",
  14 => "Fantasy",
  53 => "Thriller",
  10770 => "TV Movie",
  10752 => "War",
  37 => "Western",
  10402 => "Music",
  10749 => "Romance",
  12 => "Adventure",
);

echo '<pre>';
print_r($result2);
echo '</pre>';

  echo '<pre>';
  print_r($genres[$result->results[0]->genre_ids[0]]);
  echo '</pre>';


include ('../allocine/PHP/search.php');

include '../views/pages/home.php';