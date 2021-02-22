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

    public function show(array $data)
    {
        $post = (new PostModel())->findById($data['id']);
        dd($post);
    }
}
