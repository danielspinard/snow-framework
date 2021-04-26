<?php

namespace Snow;

class Redirect
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var string
     */
    private $route;

    /**
     * @var array
     */
<<<<<<< HEAD
    private $data;

    /**
     * Redirect constructor
     */
    public function __construct()
    {
        if ($this->router === null) {
            $this->router = new Router(env('APP_URL'));
        }
        
        return $this->router;
=======
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
>>>>>>> 18f2e8eb151815b768d28ff5a00da2ec70eb5a92
    }

    /**
     * @param string $route
     * @param array $data
     * @return Redirect
     */
<<<<<<< HEAD
    public function route(string $route, array $data = []): Redirect
    {
        $this->route = $route;
        $this->data = $data;

        return $this;
=======
    public static function route(string $route, array $data = []): Redirect
    {
        self::$route = self::$router->route($route, $data);

        return (new Redirect);
>>>>>>> 18f2e8eb151815b768d28ff5a00da2ec70eb5a92
    }

    /**
     * @return void
     */
    public function run(): void
    {
<<<<<<< HEAD
        $this->router->redirect($this->route, $this->data);
    }

    /**
     * @param string $type
     * @param string $message
     * @return void
     */
    public function flash(string $type, string $message): void
    {
        (new Session)->set('flash', [
            'type' => $type,
            'message' => $message
        ]);

        $this->run();
=======
        if(self::$route != null)
            return self::$router->redirect(self::$route);

        self::$router->redirect('error.http', ['httpErrorCode' => 404]);
>>>>>>> 18f2e8eb151815b768d28ff5a00da2ec70eb5a92
    }
}
