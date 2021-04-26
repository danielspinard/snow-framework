<?php

namespace Snow;

use function dirname;
use function random_bytes;
use function session_id;
use function session_save_path;
use function session_start;
use function session_regenerate_id;

class Session
{
    /**
     * Session constructor
     */
    public function __construct()
    {
        if (!session_id()) {
            session_save_path(dirname(__DIR__, 1) . '/runtime/session');
            session_start();
        }
    }

    /**
     * @param mixed $key
     * @return mixed
     */
    public function __get(string $key)
    {
        if (!empty($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * @param string $key
     * @return boolean
     */
    public function __isset(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @return object
     */
    public function all(): object
    {
        return (object) $_SESSION;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set(string $key, $value): Session
    {
        $_SESSION[$key] = (is_array($value) ? (object) $value : $value);
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

    /**
     * CSRF Token
     */
    public function csrf(): void
    {
        $_SESSION['csrf_token'] = base64_encode(random_bytes(20));
    }
}
