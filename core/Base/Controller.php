<?php

namespace Snow\Base;

use Snow\Engine;
use Snow\Router;
use Snow\Request;
use \Exception;

abstract class Controller
{
    /**
     * @var Router
     */
    protected $router;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Engine
     */
    protected $blade;

    /**
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->request = $this->request();
        $this->blade = new Engine();
    }

    /**
     * @return object|null
     */
    private function request(): ?object
    {
        $request = (new Request());

        foreach ($this->router->data() as $key => $value) {
            $request->$key = $request->purify($value);
        }

        return $request;
    }

    /**
     * @param string $view
     * @param array|null $data
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
    protected function redirect(string $route, array $data = []): void
    {
        $this->router->redirect($route, $data);
    }
}
