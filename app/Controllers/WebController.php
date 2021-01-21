<?php

namespace App\Controllers;

use App\Models\PostModel;

class WebController
{
    public function debug()
    {
        return view('welcome', [
            'titlePage' => 'Hello, my first view',
            'posts' => (new PostModel())->find()->order('title')->fetch(true)
        ]);
    }
}
