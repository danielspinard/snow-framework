<?php

use Snow\Session;

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

if (!function_exists('session')) {
    /**
     * @param string $name
     * @return mixed
     */
    function session()
    {
        return (new Session());
    }
}

if (!function_exists('csrf_input')) {
    /**
     * @return string
     */
    function csrf_input(): string
    {
        session()->csrf();
        return "<input type='hidden' name='csrf' value='" . (session()->csrf_token ?? "") .  "'/>";
    }
}

if (!function_exists('csrf_verify')) {
    /**
     * @return string
     */
    function csrf_verify($request)
    {
        if (
            empty(session()->csrf_token) or 
            empty($request['csrf']) or 
            $request['csrf'] != session()->csrf_token
        )
            return false;

        return true;
    }
}
