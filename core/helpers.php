<?php

if (!function_exists('env')) {
    /**
     * @param string $var
     * @return string
     */
    function env(string $var, ?string $defaultVarValue = null): ?string
    {
        if (isset($_ENV[$var]) and $_ENV[$var] != null)
            return $_ENV[$var];

        return $defaultVarValue;
    }
}
