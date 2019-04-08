<?php

/**
 * Configuration
 */

define('URL', 'http://localhost:8888/Routing-2/public/');


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
// else if(preg_match('/^article\/[0-9]+$/', $q)) n'importe quoi entre 0 et 9 le dollar veut dire : ça termine par (le + permet de gérer plusieurs digit)
// commence par article puis un nombre
else if(preg_match('/^article\/[1-9][0-9]*$/', $q)) // doit commencer par un chiffre de 1 à 9 et après à l'infini
{
    $controller = 'article';
}
else
{
    $controller = '404';
}


// Include controller

include '../controllers/'.$controller.'.php';