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
    private static function classExists(string $class): bool
    {
        return class_exists($class);
    }
}
