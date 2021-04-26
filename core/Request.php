<?php

namespace Snow;

use StdClass;
use function htmlspecialchars;
use function str_replace;
use function trim;
use function getallheaders;

class Request
{
    /**
     * @param string $string
     * @return string|null
     */
    public function purify(string $string): ?string
    {
        return trim(htmlspecialchars($string));
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
    public function headers(): object
    {
        $headers = new StdClass;

        foreach (getallheaders() as $header => $value) {
            $headers->{$this->validAttribute($header)} = $value;
        }

        return $headers;
    }
}
