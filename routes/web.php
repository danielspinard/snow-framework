<?php

$router->namespace('App\Controllers');

$router->group(null);
$router->get('/', 'WebController@index', 'app.index');
$router->get('/show/{id}', 'WebController@show', 'app.show');
$router->get('/debug', 'WebController@debug', 'app.debug');
