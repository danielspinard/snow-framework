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
    }

    /**
     * @param string $route
     * @param array $data
     * @return Redirect
     */
    public function route(string $route, array $data = []): Redirect
    {
        $this->route = $route;
        $this->data = $data;

        return $this;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        $this->router->redirect($this->route, $this->data);
    }

    /**
     * @param string $type
     * @param string $message
     * @return void
     */
    public function flash(string $type, string $message): void
    {
        (new Session())->set('flash', [
            'type' => $type,
            'message' => $message
        ]);

        $this->run();
    }
}
