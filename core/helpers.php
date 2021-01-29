<?php

use Snow\Session;
use Snow\Engine;

if (!function_exists('env')) {
    /**
     * @param string $var
     * @return string
     */
    function env(string $var, ?string $defaultVarValue = null): ?string
    {
        $var = strtoupper($var);

        if (isset($_ENV[$var]) and $_ENV[$var] != null)
            return $_ENV[$var];

        return $defaultVarValue;
    }
}

if (!function_exists('appDebug')) {
    /**
     * @return bool
     */
    function appDebug(): bool
    {
        return filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN);
    }
}

if (!function_exists('view')) {
    /**
     * @return bool
     */
    function view(string $view, ?array $data = []): void
    {
        echo (new Engine())->render('views.' . $view, $data);
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
