<?php

$router->namespace("App\Controllers\Api")->group('api');
$router->get("/", "TestController@debug");
