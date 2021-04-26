<?php

namespace Snow;

use CoffeeCode\Router\Dispatch as RouterComponent;
use function dirname;

class Router extends RouterComponent
{
    /**
     * @param string $appUrl
     * @param string $separator
     */
    public function __construct(string $appUrl, string $separator = "@")
    {
        parent::__construct($appUrl, $separator);
        $this->load();
    }

    /**
     * @param string $route
     * @param string|callback  $handler
     * @param string $name
     * @return void
     */
    public function post(string $route, $handler, string $name = null): void
    {
        $this->addRoute('POST', $route, $handler, $name);
    }

    /**
     * @param string $route
     * @param string|callback $handler
     * @param string|null $name
     */
    public function get(string $route, $handler, string $name = null): void
    {
        $this->addRoute('GET', $route, $handler, $name);
    }

    /**
     * @param string $route
     * @param string|callback $handler
     * @param string|null $name
     */
    public function put(string $route, $handler, string $name = null): void
    {
        $this->addRoute('PUT', $route, $handler, $name);
    }

    /**
     * @param string $route
     * @param string|callback $handler
     * @param string|null $name
     */
    public function patch(string $route, $handler, string $name = null): void
    {
        $this->addRoute('PATCH', $route, $handler, $name);
    }

    /**
     * @param string $route
     * @param string|callback $handler
     * @param string|null $name
     */
    public function delete(string $route, $handler, string $name = null): void
    {
        $this->addRoute('DELETE', $route, $handler, $name);
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->dispatch();

        if ($this->error() !== null) {
            return (new HttpErrorHandler($this->error()));
        }
    }

    /**
     * @return void
     */
    private function load(): void
    {
        $router = $this;
        require dirname(__DIR__, 1) . '/routes/web.php';
        require dirname(__DIR__, 1) . '/routes/api.php';
    }
}
