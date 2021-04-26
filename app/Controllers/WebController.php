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
<<<<<<< HEAD
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
=======
    {
        $post = (new PostModel())->findById($data['id']);
        dd($post);
>>>>>>> 18f2e8eb151815b768d28ff5a00da2ec70eb5a92
    }
}
