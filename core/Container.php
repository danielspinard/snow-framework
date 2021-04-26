<?php

namespace Snow;

use function class_exists;
use function ucfirst;

class Container 
{
    /**
     * @param string $class
     * @return object|null
     */
    private static function getClass(string $class): ?object
    {
        return (class_exists($class) ? new $class() : null);
    }

    /**
     * @param string $model
     * @param string $namespace
     * @return object|null
     */
    public static function getModel(string $model, ?string $namespace = '\\App\\Models\\'): ?object
    {
        return self::getClass($namespace . ucfirst($model));
    }

    /**
     * @param string $facade
     * @param string $namespace
     * @return object|null
     */
    public static function getFacade(string $facade, ?string $namespace = '\\App\\Facades\\'): ?object
    {
        return self::getClass($namespace . ucfirst($facade));
    }
}
