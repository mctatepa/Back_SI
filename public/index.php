<?php

/**
 * Configuration
 */

define('URL', 'http://localhost:8888/Projet/Back_SI/');


/**
 * Routing
 */

 //Get 'q' paramter
 $q = !empty($_GET['q']) ? $_GET['q'] : 'home';

$controller = null;

// Define  controller 
$controller = '404';


if($q == 'home')
{
    $controller = 'home';
}
else if($q == 'about-us' || $q == 'about')
{
    $controller = 'about';
} 
else if(preg_match('/^movie/' , $q))
{
    $controller = 'movie';
}
else
{
    $controller = '404';
}

// Include controller

include '../views/partials/header.php';
include '../controllers/'.$controller.'.php';
include '../views/partials/footer.php';