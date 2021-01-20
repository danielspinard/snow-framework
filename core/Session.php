<?php

namespace Snow;

use function session_id;
use function session_save_path;
use function dirname;
use function session_start;
use function session_regenerate_id;

class Session
{
    public function __construct()
    {
        if (!session_id()) {
            session_save_path(dirname(__DIR__, 1) . '/runtime/session');
            session_start();
        }
    }

    /**
     * @param mixed $name
     * @return mixed
     */
    public function __get($name)
    {
        if (!empty($_SESSION[$name]))
            return $_SESSION[$name];
        return null;
    }

    /**
     * @param mixed $name
     * @return boolean
     */
    public function __isset($name): bool
    {
        $this->has($name);
    }

    /**
     * @return object
     */
    public function all(): object
    {
        return (object)$_SESSION;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, $value): Session
    {
        // TODO
        return $this;
    }

    /**
     * @param string $key
     * @return Session
     */
    public function unset(string $key): Session
    {
        unset($_SESSION[$key]);
        return $this;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @return Session
     */
    public function regenerate(): Session
    {
        session_regenerate_id(true);
        return $this;
    }

    /**
     * @return Session
     */
    public function destroy(): Session
    {
        session_destroy();
        return $this;
    }
}
