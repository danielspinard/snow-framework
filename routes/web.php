<?php

$router->namespace("App\Controllers")->group(null);
$router->get("/", "WebController@index");
$router->get("/{id}", "WebController@show");
