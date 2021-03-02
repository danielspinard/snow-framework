<?php

namespace Snow;

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
     * @var array
     */
    private static $data;

    /**
     * @param Router $router
     * @return Redirect
     */
    public static function router(Router $router): Redirect
    {
        if (self::$router === null)
            self::$router = $router;
        
        return (new Redirect);
    }

    /**
     * @param string $route
     * @param array $data
     * @return Redirect
     */
    public static function route(string $route, array $data = []): Redirect
    {
        self::$route = self::$router->route($route, $data);

        return (new Redirect);
    }

    /**
     * @return void
     */
    public static function run()
    {
        if(self::$route != null)
            return self::$router->redirect(self::$route);

        self::$router->redirect('error.http', ['httpErrorCode' => 404]);
    }
}
