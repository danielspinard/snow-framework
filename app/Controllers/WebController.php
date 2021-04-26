<?php

namespace App\Controllers;

use Snow\Base\Controller;
use Snow\Bootstrap;
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
        dd((new PostModel)->findById($data['id']));
    }

    public function debug()
    {
        // dump(Bootstrap::$core);
        Bootstrap::make('Minify', 'Snow\\');
        Bootstrap::make('ExampleMIddleware', 'App\\MIddlewares\\');
        // dump(Bootstrap::$core);
        // Bootstrap::make('Test');
        dump(Bootstrap::$core);
        // ($this->redirect('app.show', ['id' => 404]));
    }
}
