<?php

$router->namespace('App\Controllers')->group(null);
$router->get('/', 'WebController@index', 'card.index');
$router->get('/{id}', 'WebController@show', 'card.show');
