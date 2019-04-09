<?php

$title = 'My Website';

// Define city and use Paris as default
$movie = empty($_POST['movie']) ? 'fight club' : $_POST['movie'];

// Create API url
$movieUrl = 'https://api.themoviedb.org/3/search/movie?';
$movieUrl .= http_build_query([
  'api_key' => '0053c3d101416f34e0b7aba3d389596b',
  'language' => 'fr',
  'query' => urlencode($movie),
  'page' => 1,
]);


//
//  REQUEST IMDB (RAPIDAPI)
//

require_once '../unirest-php-master/src/Unirest.php';

$movieUrl2 = Unirest\Request::get("https://movie-database-imdb-alternative.p.rapidapi.com/?s='./$movie/'",
  array(
    "X-RapidAPI-Host" => "movie-database-imdb-alternative.p.rapidapi.com",
    "X-RapidAPI-Key" => "121e39e918mshbaf8ba77d175913p1ec8c6jsnd0dc695e72dd"
  )
);

// Create cache info
$cacheKey = $movie;
$cachePath = '../cache/'.$cacheKey;
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

  echo '<pre>';
  print_r($result);
  echo '</pre>';


echo '<pre>';
print_r($url_image);
echo '</pre>';
include '../views/pages/home.php';