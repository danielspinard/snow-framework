<?php

<<<<<<< HEAD
$router->namespace('App\Controllers');

$router->group(null);
$router->get('/', 'WebController@index', 'app.index');
$router->get('/show/{id}', 'WebController@show', 'app.show');
$router->get('/debug', 'WebController@debug', 'app.debug');
=======
$router->namespace('App\Controllers')->group(null);
$router->get('/', 'WebController@index', 'card.index');
$router->get('/{id}', 'WebController@show', 'card.show');
>>>>>>> 18f2e8eb151815b768d28ff5a00da2ec70eb5a92
