<?php
$title = "Move'in";
$movie_id = 0;


//
// REQUEST 1 TMDB 
//

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


// Creation of the TMDB ID array

$tmdbId = [
  0 => '',
];

foreach ($result->results as $_searches) {
  //Get the IMDB ID's
  $TMDBID = $_searches->id;

  //push IMDB ID's in array
  $tmdbId[] = $TMDBID;
}

  /*echo '<pre>';
  print_r($tmdbId);
  echo '</pre>';*/


//
// REQUEST 2 TMDB 2
//

// Create API url
$Imdb_Id = 'https://api.themoviedb.org/3/movie/550?';
$Imdb_Id .= http_build_query([
  'api_key' => '0053c3d101416f34e0b7aba3d389596b',
]);

// CACHE IMDB ID

// Create cache info
$cacheKey3 = $movie;
$cachePath3 = '../cache/cache_IMDBID/'.$cacheKey;
$cacheUsed3 = false;


if(file_exists($cachePath3) && time() - filemtime($cachePath3) < (60*60*24))
{
  $result3 = file_get_contents($cachePath3);
  $cacheUsed3 = true;
}
else{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $Imdb_Id);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $result3 = curl_exec($curl);
  curl_close($curl);

  // Save in cache
  file_put_contents($cachePath3, $result3);
}
// Show result

    // Decode JSON
    $result3 = json_decode($result3);

$Imdb_Id = $result3->imdb_id;

/*echo '<pre>';
print_r($Imdb_Id);
echo '</pre>';*/


//
//  REQUEST 3 IMDB (RAPIDAPI)
//

require_once '../unirest-php-master/src/Unirest.php';

// Create cache info
$cacheKey2 = $Imdb_Id;
$cachePath2 = '../cache/cache_IMDB/'.$cacheKey2;
$cacheUsed2 = false;


if(file_exists($cachePath2) && time() - filemtime($cachePath2) < (60*60*24))
{
  $result_ratings = file_get_contents($cachePath2);
  $result_ratings = json_decode($result_ratings);
  $cacheUsed2 = true;
}

else{

  $result_ratings = Unirest\Request::get("https://movie-database-imdb-alternative.p.rapidapi.com/?i=$Imdb_Id",
  array(
    "X-RapidAPI-Host" => "movie-database-imdb-alternative.p.rapidapi.com",
    "X-RapidAPI-Key" => "121e39e918mshbaf8ba77d175913p1ec8c6jsnd0dc695e72dd"
  )
);

  // Save in cache
  file_put_contents($cachePath2, json_encode($result_ratings));
}


/*echo '<pre>';
print_r($result_ratings->body->Ratings);
echo '</pre>';*/


//
//  REQUEST 4 IMDB (RAPIDAPI)
//

require_once '../unirest-php-master/src/Unirest.php';

// Create cache info
$cacheKey4 = $Imdb_Id;
$cachePath4 = '../cache/cache_Utelly/'.$cacheKey4;
$cacheUsed4 = false;


if(file_exists($cachePath4) && time() - filemtime($cachePath4) < (60*60*24))
{
  $locations = file_get_contents($cachePath4);
  $locations = json_decode($locations);
  $cacheUsed4 = true;
}

else{

$locations = Unirest\Request::get("https://utelly-tv-shows-and-movies-availability-v1.p.rapidapi.com/lookup?term='./$movie/'",
  array(
    "X-RapidAPI-Host" => "utelly-tv-shows-and-movies-availability-v1.p.rapidapi.com",
    "X-RapidAPI-Key" => "121e39e918mshbaf8ba77d175913p1ec8c6jsnd0dc695e72dd"
  )
);

  // Save in cache
  file_put_contents($cachePath4, json_encode($locations));
}


/*echo '<pre>';
print_r($locations->body->results[0]->locations);
echo '</pre>';*/


// GENDERS ID

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

/* echo '<pre>';
 print_r($result2);
 echo '</pre>';*/



include ('../allocine/PHP/search.php');

include '../views/pages/home.php';