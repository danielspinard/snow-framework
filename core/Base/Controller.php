<?php

namespace Snow\Base;

use Snow\Engine;
use Snow\Redirect;

abstract class Controller
{
    /**
     * @param string $view
     * @param array $data
     * @param string $customPath
     * @return void
     */
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
    }
}
