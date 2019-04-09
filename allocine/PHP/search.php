<?php

include (__DIR__.'/allocine.class.php');

define('ALLOCINE_PARTNER_KEY', '100043982026');
define('ALLOCINE_SECRET_KEY', '29d185d98c984a359e6e6f26a0474269');

$allocine = new Allocine(ALLOCINE_PARTNER_KEY, ALLOCINE_SECRET_KEY);

$result_allocine = $allocine->search("fight club");
$result_allocine = json_decode($result_allocine);
echo '<pre>';
print_r(($result_allocine->feed->movie[0]->statistics->pressRating + $result_allocine->feed->movie[0]->statistics->userRating)/2);
echo '</pre>';