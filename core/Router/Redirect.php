<?php

namespace Snow\Router;

class Redirect
{
    /**
     * @var Router
     */
    private static $router;

    /**
     * @var string $route
     */
    private static $route;

    /**
     * @return Router
     */
    private static function router(): Router
    {
        if (self::$router == null)
            self::$router = new Router(env('APP_URL'));
        
        return self::$router;
    }

    /**
     * Set route to redirect
     * 
     * @param string $route
     * @return Redirect
     */
    public static function route(string $route): Redirect
    {
        self::$route = self::router()->route($route);
        return (new Redirect());
    }

    /**
     * Run route (redirect)
     * 
     * @return void
     */
    public static function run()
    {
        if(self::$route != null)
            return self::router()->redirect(self::$route);

        self::router()->redirect("error/404");
    }

    /**
     * Set flash session
     *
     * @param string $type
     * @param string $message
     * @return void
     */
    public static function flash(string $type, string $message)
    {
        // set session flash
        return self::run();
    }
}
