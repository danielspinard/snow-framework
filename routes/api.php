<?php

$router->namespace('App\Controllers\Api');

$router->group('api');
$router->get('/', 'TestController@debug');
