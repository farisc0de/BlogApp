<?php

namespace App\Controllers;

use App\Models\PostsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Post extends BaseController
{
    public function view($id)
    {
        return view('App/Post', [
            'post' => $this->getPostOr404($id)
        ]);
    }

    public function getPostOr404($id)
    {
        $model = new PostsModel();

        $post = $model->getPostById($id);

        if ($post == null) {
            throw new PageNotFoundException("Post with id: {$id} Not Found");
        }

        return $post;
    }

    public function cover($id)
    {
        $post = new PostsModel();

        $post = $this->getPostOr404($id);

        if ($post->poster_file != null) {
            $path = WRITEPATH . 'uploads/covers/' . $post->poster_file;

            $finfo = new \finfo(FILEINFO_MIME);

            $type = $finfo->file($path);

            header("Content-Type: {$type}");
            header("Content-Length: " . filesize($path));

            readfile($path);

            exit;
        }
    }
}
