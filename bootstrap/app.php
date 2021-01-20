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

if (filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN) == true)
    (Symfony\Component\ErrorHandler\Debug::enable());

/**
 * |--------------------------------------------------------------------------
 * | Configure the time zone to be used.
 * |--------------------------------------------------------------------------
 */
date_default_timezone_set(env('APP_TIMEZONE'));

/*
 * |--------------------------------------------------------------------------
 * | Load the application routes
 * |--------------------------------------------------------------------------
 */

$router = new Snow\Router\Router(env('APP_URL'));

require __DIR__ . '/../routes/web.php';
require __DIR__ . '/../routes/api.php';

return $router;