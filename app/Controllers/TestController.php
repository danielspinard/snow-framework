<?php

namespace App\Controllers;

class TestController
{
    public function debug()
    {
        print_r($_SERVER);
    }
}
