<?php

namespace Snow;

use StdClass;

class Request
{
    /**
     * @param string $string
     * @return string|null
     */
    public function purify(string $string): ?string
    {
        return htmlspecialchars($string);
    }

    /**
     * @param string $key
     * @return string
     */
    private function validAttribute(string $key): string
    {
        return str_replace([' ', '-', '*'], '_', $key);
    }

    /**
     * @return object
     */
    public function headers(): object
    {
        $headers = new StdClass;
        $headers->method = $_SERVER['REQUEST_METHOD'];

        foreach (getallheaders() as $header => $value) {
            $headers->{$this->validAttribute($header)} = $value;
        }

        return $headers;
    }

    /**
     * @return object
     */
    public function body(): object
    {
        $body = new StdClass;

        foreach ($_REQUEST as $key => $value) {
            $body->{$this->validAttribute($key)} = $this->purify($value);
        }

        return $body;
    }

    /**
     * @return object
     */
    public function files(): object
    {
        $files = new StdClass;

        foreach ($_FILES as $key => $value) {
            $files->$key = $value;
        }

        return $files;
    }
}
