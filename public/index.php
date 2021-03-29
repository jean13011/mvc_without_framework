<?php

use Router\Router;

require '../vendor/autoload.php';

if (isset($_GET["url"]))
{
    $router = new Router($_GET["url"]);

    $router->get('/', 'blogController@index');
    $router->get('/post/:id', 'blogController@show');

    $router->run();
}

