<?php

namespace Snow;

use CoffeeCode\Router\Dispatch as RouterComponent;
use Snow\Router\Exception;

class Router extends RouterComponent
{
    /**
     * @param string $appUrl
     * @param null|string $separator
     */
    public function __construct(string $appUrl, ?string $separator = "@")
    {
        parent::__construct($appUrl, $separator);
    }

    /**
     * @param string $route
     * @param $handler
     * @param string|null $name
     */
    public function post(string $route, $handler, string $name = null): void
    {
        $this->addRoute('POST', $route, $handler, $name);
    }

    /**
     * @param string $route
     * @param $handler
     * @param string|null $name
     */
    public function get(string $route, $handler, string $name = null): void
    {
        $this->addRoute('GET', $route, $handler, $name);
    }

    /**
     * @param string $route
     * @param $handler
     * @param string|null $name
     */
    public function put(string $route, $handler, string $name = null): void
    {
        $this->addRoute('PUT', $route, $handler, $name);
    }

    /**
     * @param string $route
     * @param $handler
     * @param string|null $name
     */
    public function patch(string $route, $handler, string $name = null): void
    {
        $this->addRoute('PATCH', $route, $handler, $name);
    }

    /**
     * @param string $route
     * @param $handler
     * @param string|null $name
     */
    public function delete(string $route, $handler, string $name = null): void
    {
        $this->addRoute('DELETE', $route, $handler, $name);
    }

    public function run()
    {
        Redirect::router($this);
        Exception::handleRouterHttpError($this);
        $this->dispatch();
        Exception::dispatchRouterHttpError($this);
    }
}
