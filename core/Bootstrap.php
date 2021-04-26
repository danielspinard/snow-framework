<?php

namespace Snow;

use Exception;

class Bootstrap
{
    /**
     * @var array
     */
    public static $core = [];

    /**
     * @param string $class
     * @param string $namespace
     * @param string $alias
     * @param array $arguments
     * @return void
     */
    public static function make(string $class, string $namespace = "Snow\\", string $alias = null, array $arguments = [])
    {
        $object = ($namespace . $class);

        if (!Container::classExists($object))
            throw new Exception('Class ' . $class . ' not found in namespace ' . $namespace . ' .');

        self::$core[$alias ?? $object] = (new $object());
    }
}
