<?php

namespace Snow;

use function ctype_alnum;
use function strlen;

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

    /**
     * @param string $string
     * @param int $minLength
     * @param int $maxLength
     * @return bool
     */
    public static function length(string $string, int $minLength, int $maxLength): bool
    {
        $length = strlen($string);

        if ($length >= $minLength && $length <= $maxLength) {
            return true;
        }
        
        return false;
    }

    /**
     * @param string $string
     * @param array $domains
     * @return bool
     */
    public static function email(string $string, array $whitelist = []): bool
    {
        if (empty($whitelist)) {
            return filter_var($string, FILTER_VALIDATE_EMAIL);
        }
        
        $email = explode('@', $string);

        foreach ($whitelist as $domain) {
            if ($email[1] === $domain) {
                return true;
            }
        }

        return false;
    }
}
