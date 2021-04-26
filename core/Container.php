<?php

namespace Snow;

use function class_exists;
use function ucfirst;

class Container 
{
    /**
     * @param string $class
     * @return boolean
     */
    public static function classExists(string $class): bool
    {
        return class_exists($class);
    }

    /**
     * @param string $class
     * @param string $namespace
     * @return object|null
     */
    public static function getModel(string $class, ?string $namespace = '\\App\\Models\\'): ?object
    {
        if(self::classExists($model = $namespace . ucfirst($class))) {
            return new $model();
        }
        
        return null;
    }

    /**
     * @param string $class
     * @param string $namespace
     * @return object|null
     */
    public static function getFacade(string $class, ?string $namespace = '\\App\\Facades\\'): ?object
    {
        if(self::classExists($facade = $namespace . ucfirst($class))) {
            return new $facade();
        }
        
        return null;
    }
}
