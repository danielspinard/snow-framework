<?php

namespace App\Controllers;

use Snow\Base\Controller;
use Snow\Uploader;
use App\Models\PostModel;

class WebController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
        return $this->render('post.index', [
            'posts' => (new PostModel())->find()->fetch(true)
        ]);
    }

    /**
     * @return void
     */
    public function show()
    {
        $post = (new PostModel)->findById($this->request()->id);

        if (!$post) {
            return $this->redirect('app.index');
        }

        return $this->render('post.show', ['post' => $post->data()]);
    }

    /**
     * @return void
     */
    public function debug()
    {
        // save test
        // $post = (new PostModel());
        // $post->title;
        // $post->content;
        // $post->save();

        // var_dump($post->fail());
    }
}
