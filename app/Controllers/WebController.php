<?php

namespace App\Controllers;

use Snow\Base\Controller;
use App\Models\PostModel;

class WebController extends Controller
{
    /**
     * @return void
     */
    public function index(): void
    {
        $this->render('post.index', [
            'posts' => PostModel::get()
        ]);
    }

    /**
     * @return void
     */
    public function show(): void
    {
        $post = PostModel::find($this->request()->id);

        if ($post !== null) {
            $this->render('post.show', [
                'post' => $post
            ]);

            return;
        }

        $this->redirect('app.index');
    }
}
