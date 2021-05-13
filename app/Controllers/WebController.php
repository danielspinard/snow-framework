<?php

namespace App\Controllers;

use Snow\Base\Controller;
use Snow\Uploader;
use Snow\Validator;
use App\Models\PostModel;

class WebController extends Controller
{
    /**
     * @return void
     */
    public function index(): void
    {
        $posts = (new PostModel())->find()->fetch(true);

        $this->render('post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * @return void
     */
    public function show(): void
    {
        $post = (new PostModel)->findById($this->request()->id);

        if (!$post) {
            $this->render('post.show', [
                'post' => $post->data()
            ]);

            return;
        }
        
        $this->redirect('app.index');
    }
}
