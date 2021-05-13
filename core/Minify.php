<?php

namespace Snow;

use InvalidArgumentException;
use DirectoryIterator;
use MatthiasMullie\Minify\Minify as Minifier;

class Minify
{
    /**
     * @var array
     */
    private $basedir = [];

    /**
     * Minify constructor
     * 
     * @param string $basedirCSS
     * @param string $basedirJS
     */
    public function __construct(string $basedirCSS, string $basedirJS)
    {
        $this->basedir['css'] = $basedirCSS;
        $this->basedir['js'] = $basedirJS;
    }

    /**
     * @param string $dirPath
     * @return Minifier
     */
    private function scandir(Minifier $minifier, string $type): Minifier
    {
        $files = new DirectoryIterator($this->basedir[$type]);

        foreach ($files as $file) {
            if ($file->getExtension() === $type) {
                $minifier->add($file->getPathname());
            }
        }

        return $minifier;
    }
}
