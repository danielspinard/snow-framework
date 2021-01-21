<?php

namespace Snow;

use eftec\bladeone\BladeOne as Blade;

class Engine
{
    /**
     * @var Blade
     */
    private $blade;

    public function __construct()
    {
        $this->blade = new Blade(
            dirname(__DIR__, 1) . "resources/",
            dirname(__DIR__, 1) . "runtime/compile/",
        );

        $this->blade->setBaseUrl(env('APP_URL'));
        $this->blade->setFileExtension(".blade.php");
        $this->blade->setMode((appDebug())? Blade::MODE_SLOW : Blade::MODE_FAST);
        $this->blade->pipeEnable = true;

        return $this;
    }

    public function render(string $view, ?array $data): void
    {
        echo $this->blade->setView($view)->share($data)->run();
    }
}
