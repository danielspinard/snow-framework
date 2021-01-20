<?php

$router->namespace("App\Controllers")->group(null);
$router->get("/", "TestController@debug");
