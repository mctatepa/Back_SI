<?php
include ('../allocine/PHP/allocine.class.php');

$movie = $_GET["movie_name"];

if(!isset($_GET['id']) OR !is_numeric($_GET['id']))
    {
        header('Location: home.php'); 
    }
    else
    {
        extract($_GET);
        $movieid = $_GET['id']; 
        $movieid = strip_tags($movieid);
        require_once('config/functions.php');
        
        require('config/form-handler.php');

        $comments = getComments($movieid);
    }

//
// REQUEST 2 TMDB 2
//

// Create API url
$Imdb_Id = "https://api.themoviedb.org/3/movie/$movieid?";
$Imdb_Id .= http_build_query([
  'api_key' => '0053c3d101416f34e0b7aba3d389596b',
]);

// CACHE IMDB ID

// Create cache info
$cacheKey3 = $movie;
$cachePath3 = '../cache/cache_IMDBID/'.$cacheKey3;
$cacheUsed3 = false;


if(false && file_exists($cachePath3) && time() - filemtime($cachePath3) < (60*60*24))
{
  $result_tmdb = file_get_contents($cachePath3);
  $cacheUsed3 = true;
}
else{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $Imdb_Id);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $result_tmdb = curl_exec($curl);
  curl_close($curl);

  // Save in cache
  file_put_contents($cachePath3, $result_tmdb);
}
// Show result

    // Decode JSON
    $result_tmdb = json_decode($result_tmdb);

$Imdb_Id = $result_tmdb->imdb_id;



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



define('ALLOCINE_PARTNER_KEY', '100043982026');
define('ALLOCINE_SECRET_KEY', '29d185d98c984a359e6e6f26a0474269');

$allocine = new Allocine(ALLOCINE_PARTNER_KEY, ALLOCINE_SECRET_KEY);

$result_allocine = $allocine->search($movie);
$result_allocine = json_decode($result_allocine);


//
// REQUEST 5  RECOMMANDATIONS
//


// Create API url
$recommandationURL = "https://api.themoviedb.org/3/movie/$movieid/recommendations?";
$recommandationURL .= http_build_query([
  'api_key' => '0053c3d101416f34e0b7aba3d389596b',
]);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $recommandationURL);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$recommandation = curl_exec($curl);
curl_close($curl);

// Show result

// Decode JSON
$recommandation = json_decode($recommandation);





// $imdb_grade = ((int) filter_var($result_ratings->body->Ratings[0]->Value, FILTER_SANITIZE_NUMBER_INT)/1000);
// $rotten_grade = ((int) filter_var($result_ratings->body->Ratings[1]->Value, FILTER_SANITIZE_NUMBER_INT)/10);
// $metascore_grade = ((int) filter_var($result_ratings->body->Ratings[2]->Value, FILTER_SANITIZE_NUMBER_INT)/10000);
// $allocine_grade = $result_allocine->feed->movie[0]->statistics->pressRating + $result_allocine->feed->movie[0]->statistics->userRating;
// $average_grade = ($allocine_grade + $imdb_grade - 0.01 + $rotten_grade + $metascore_grade - 0.01)/4;

if (empty($result_ratings->body->Ratings[2])) {
    $metascore_grade = 0;
}else{
    $metascore_grade = ((int) filter_var($result_ratings->body->Ratings[2]->Value, FILTER_SANITIZE_NUMBER_INT)/10000);
}
if (empty($result_ratings->body->Ratings[1])) {
    $rotten_grade = 0;
}else{
    $rotten_grade = ((int) filter_var($result_ratings->body->Ratings[1]->Value, FILTER_SANITIZE_NUMBER_INT)/10);
}
if (empty($result_ratings->body->Ratings[0])) {
    $imdb_grade  = 0;
}else{
    $imdb_grade = ((int) filter_var($result_ratings->body->Ratings[0]->Value, FILTER_SANITIZE_NUMBER_INT)/1000);
}
if (empty($result_allocine->feed->movie[0]->statistics)) {
    $allocine_grade  = 0;
}else{
    $allocine_grade = $result_allocine->feed->movie[0]->statistics->pressRating + $result_allocine->feed->movie[0]->statistics->userRating;
}

$Grades = array(
    0 => $imdb_grade,
    1 => $allocine_grade,
    2 => $rotten_grade,
    3 => $metascore_grade,
);

$Grades = array_filter($Grades); // removing blank, null, false, 0 (zero) values

function calcul_average_grade($Grades){
    $average_grade = 0;
    foreach ($Grades as $_Grade) {
        $average_grade += $_Grade;
    }
    $average_grade = $average_grade/count($Grades);
    return
        $average_grade = number_format((float)$average_grade, 2, '.', '');
}
    $img_url = $result_ratings->body->Poster;
    $handle = curl_init($img_url);
    curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
    $response = curl_exec($handle);
    $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    if($httpCode == 404 || $httpCode == 403) {
        $img_url = "public/assets/images/poster_placeholder.png";
    }
    curl_close($handle);
    $handle = $img_url;



$average_grade = calcul_average_grade($Grades);

if (empty($result_ratings->body)) {
    $Director = "unavailable";
$Actors = "unavailable";
$Date = "unavailable";
$Genres = "unavailable";
$Plot = "unavailable";
}else{
$Director = $result_ratings->body->Director;
$Actors = $result_ratings->body->Actors;
$Date = $result_ratings->body->Released;
$Genres = $result_ratings->body->Genre;
$Plot = $result_ratings->body->Plot;
}

if (empty($locations->body->results)) {
    $locations = array ();
}else{
    $locations = $locations->body->results[0]->locations;
}
// Use preg_split() function 
$Genres = preg_split ("/\,/", $Genres);


if(empty($recommandation->results)){
    $recommandations = array(
        0 => "public/assets/images/poster_placeholder.png",
        1 => "public/assets/images/poster_placeholder.png",
        2 => "public/assets/images/poster_placeholder.png",
        3 => "public/assets/images/poster_placeholder.png",
      );
}else{
    for ($i=0; $i <= 3; $i++){
        $reco_path = $recommandation->results[$i]->poster_path;
        $recommandations [] = "http://image.tmdb.org/t/p/w300/$reco_path";        
    }
}

include '../views/pages/movie.php';