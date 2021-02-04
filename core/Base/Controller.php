<?php

namespace Snow\Base;

use Snow\Engine;

abstract class Controller
{
    /**
     * @param string $view
     * @param array|null $data
     * @return void
     */
    protected function render(string $view, ?array $data = [])
    {
        echo (Engine::class)->render('views.' . $view, $data);
    }
}
