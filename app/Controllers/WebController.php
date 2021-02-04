<?php

namespace App\Controllers;

use Snow\Base\Controller;
use App\Models\PostModel;

class WebController extends Controller
{
    public function index()
    {
        $posts = (new PostModel())->find()->order('title')->fetch(true) ?? [];
        
        return $this->render('welcome', [
            'posts' => $posts
        ]);
    }

    public function debug()
    {
        dd($GLOBALS);
    }
}
