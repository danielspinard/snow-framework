<?php

namespace Snow\Base;

use Snow\Engine;
<<<<<<< HEAD
use Snow\Router;
use Snow\Request;
use \Exception;
=======
use Snow\Redirect;
>>>>>>> 18f2e8eb151815b768d28ff5a00da2ec70eb5a92

abstract class Controller
{
    /**
     * @var Router
     */
    protected $router;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Engine
     */
    private $blade;

    /**
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->request = new Request;
        $this->blade = new Engine;
    }

    /**
     * @param array $data
     * @return object|null
     */
    protected function request(array $data = []): ?object
    {
        $request = $this->request->body();
        $request->headers = $this->request->headers();

        foreach ($data as $key => $value) {
            $request->$key = $this->request->purify($value);
        }

        return $request;
    }

    /**
     * @param string $view
     * @param array $data
     * @param string $customPath
     * @return void
     * @throws Exception
     */
    protected function render(string $view, ?array $data = []): void
    {
        echo $this->blade->render('views.' . $view, $data);
    }

    /**
     * @param string $route
     * @param array $data
     * @return void
     */
<<<<<<< HEAD
    protected function redirect(string $route, array $data = []): void
    {
        $this->router->redirect($route, $data);
=======
    protected function render(string $view, array $data = [], string $customPath = 'views'): void
    {
        echo (new Engine())->render($customPath . '.' . $view, $data);
    }

    /**
     * @param string $route
     * @param array $data
     * @return void
     */
    protected function redirect(string $route, array $data = [])
    {
        Redirect::route($route, $data)::run();
>>>>>>> 18f2e8eb151815b768d28ff5a00da2ec70eb5a92
    }
}
