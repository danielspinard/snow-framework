<?php

namespace App\Controllers;

use App\Models\PostModel;

class WebController
{
    public function debug()
    {
        $posts = (new PostModel())->find()->order('title')->fetch(true) ?? [];
        
        return view('welcome', [
            'titlePage' => 'Hello, my first view',
            'posts' => $posts
        ]);
    }
}
