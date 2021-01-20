<?php

if (!function_exists('env')) {
    /**
     * @param string $var
     * @return string
     */
    function env(string $var): string
    {
        return $_ENV[$var] ?? null;
    }
}
