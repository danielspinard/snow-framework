<?php

namespace Snow;

use eftec\bladeone\BladeOne as Blade;
use \Exception;

class Engine
{
    /**
     * @var Blade
     */
    private $blade;

    /**
     * Engine constructor.
     */
    public function __construct()
    {
        $blade = $this->blade = new Blade(
            dirname(__DIR__, 1) . '/resources',
            dirname(__DIR__, 1) . '/runtime/compile'
        );

        $blade->pipeEnable = true;
        $blade->setMode((appDebug() ? Blade::MODE_SLOW : Blade::MODE_FAST));
        $blade->setBaseUrl(env('APP_URL'));
        $blade->setFileExtension(".blade.php");
        $blade->setOptimize(true);

        return $this;
    }

    /**
     * @param string $view
     * @param array $data
     * @return string
     * @throws Exception
     */
    public function render(string $view, array $data = []): string
    {
        $file = '/resources/' . str_replace('.', '/', $view) . '.blade.php';

        if (!file_exists(dirname(__DIR__, 1) . $file)) {
            throw new EngineException('View not be found in ' . $file);
        }

        return $this->blade->setView($view)->share($data)->run();
    }
}
