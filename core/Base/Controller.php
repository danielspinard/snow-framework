<?php

namespace Snow\Base;

use Snow\Engine;

abstract class Controller
{
    /**
     * @param string $view
     * @param array|null $data
     * @param string $customPath
     * @return void
     */
    protected function render(string $view, ?array $data = [], string $customPath = 'views'): void
    {
        echo (new Engine)->render($customPath . '.' . $view, $data);
    }
}
