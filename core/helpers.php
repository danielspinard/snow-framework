<?php

use Snow\Session;
use Snow\Engine;

if (!function_exists('env')) {
    /**
     * @param string $var
     * @param string|null $defaultVarValue
     * @return string
     */
    function env(string $var, string $defaultVarValue = null): ?string
    {
        $var = strtoupper($var);

        if (isset($_ENV[$var]) && $_ENV[$var] !== null) {
            return $_ENV[$var];
        }

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
     * @param string $view
     * @param array $data
     * @return void
     * @throws Exception
     */
    function view(string $view, array $data = []): void
    {
        echo (new Engine())->render('views.' . $view, $data);
    }
}

if (!function_exists('dd')) {
    /**
     * @param mixed $toDump
     * @return mixed
     */
    function dd($toDump)
    {
        die(array_map(
            function () use ($toDump) {
                dump($toDump); 
            }, func_get_args()
        ));
    }
}

if (!function_exists('session')) {
    /**
     * @return Session
     */
    function session(): Session
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
        return '<input type="hidden" name="csrf" value="' . (session()->csrf_token ?? "") .  '" />';
    }
}

if (!function_exists('csrf_verify')) {
    /**
     * @param object $request
     * @return bool
     */
    function csrf_verify(object $request)
    {
        if (
            empty(session()->csrf_token)
            || empty($request->csrf)
            || $request->csrf != session()->csrf_token
        ) {
            return false;
        }

        return true;
    }
}

if (!function_exists('request_method')) {
    /**
     * @param string $method
     * @return string
     */
    function request_method(string $method): string
    {
        return '<input type="hidden" name="_method" value="' . strtoupper($method) .  '" />';
    }
}

if (!function_exists('route')) {
    /**
     * @param string $route
     * @param array $data
     * @return string|null
     */
    function route(string $route, array $data = []): ?string
    {
        return $GLOBALS['router']->route($route, $data);
    }
}