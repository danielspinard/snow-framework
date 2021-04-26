<?php

namespace Snow\Base;

use function ctype_alnum;

class Validator
{
    /**
     * @param string $string
     * @return bool
     */
    public static function alphanum(string $string): bool
    {
        return ctype_alnum($string);
    }
}
