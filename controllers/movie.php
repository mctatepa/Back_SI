<?php
$tmdb = $_GET['id']; 

echo '<pre>';
print_r($tmdb);
echo '</pre>';
include '../views/pages/movie.php';