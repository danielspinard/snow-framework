<?php

/**
 * |--------------------------------------------------------------------------
 * | Including autoload to automagically load all classes
 * |--------------------------------------------------------------------------
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * |--------------------------------------------------------------------------
 * | Loads all environment variables
 * |--------------------------------------------------------------------------
 */
$repository = Dotenv\Repository\RepositoryBuilder::createWithNoAdapters()
    ->addAdapter(Dotenv\Repository\Adapter\EnvConstAdapter::class)
    ->addWriter(Dotenv\Repository\Adapter\PutenvAdapter::class)
    ->immutable()
    ->make();

(Dotenv\Dotenv::create(
    $repository, __DIR__ . '/../.'
))->load();

/**
 * |--------------------------------------------------------------------------
 * | The ErrorHandler component provides tools to manage errors and ease debugging PHP code.
 * |--------------------------------------------------------------------------
 */
if (appDebug())
    (Symfony\Component\ErrorHandler\Debug::enable());

/**
 * |--------------------------------------------------------------------------
 * | Load the defines needed to establish a connection to the datalayer
 * |--------------------------------------------------------------------------
 */
(Snow\Database::define(
    env('DB_CONNECTION', 'mysql'),
    env('DB_HOST', '127.0.0.1'),
    env('DB_PORT', '3306'),
    env('DB_DATABASE', 'test'),
    env('DB_USERNAME', 'root'),
    env('DB_PASSWORD', 'root')
));

/**
 * |--------------------------------------------------------------------------
 * | Configure the time zone to be used.
 * |--------------------------------------------------------------------------
 */
date_default_timezone_set(env('APP_TIMEZONE'));

/**
 * |--------------------------------------------------------------------------
 * | Start safely and optimally session
 * |--------------------------------------------------------------------------
 */
(new Snow\Session());

/**
 * |--------------------------------------------------------------------------
 * | Start bladeone template engine
 * |--------------------------------------------------------------------------
 */
(new Snow\Engine());

/*
 * |--------------------------------------------------------------------------
 * | Load the application routes
 * |--------------------------------------------------------------------------
 */
$router = new Snow\Router(env('APP_URL'));

require __DIR__ . '/../routes/web.php';
require __DIR__ . '/../routes/api.php';

return $router;
