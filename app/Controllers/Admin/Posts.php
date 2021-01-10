<?php

namespace App\Controllers\Admin;

use \App\Controllers\BaseController;
use App\Entities\Post;
use \CodeIgniter\Exceptions\PageNotFoundException;

class Posts extends BaseController
{
    private $model;

    public function __construct()
    {
        $this->model = new \App\Models\PostsModel();
    }

    public function index()
    {
        $posts = $this->model->getAllPosts();

        return view('Admin/Posts/index', [
            'posts' => $posts,
            'pages' => $this->model->pager
        ]);
    }

    public function show($id)
    {
        $post = $this->getPostOr404($id);

        return view("Admin/Posts/show", [
            'post' => $post,
        ]);
    }

    public function new()
    {
        $post = new Post();

        $user = service('auth')->getCurrentUser();

        return view("Admin/Posts/new", [
            'user' => $user,
            'post' => $post
        ]);
    }

    public function create()
    {
        $file = $this->request->getFile('upload');

        $error_code = $file->getError();

        if (!$file->isValid()) {
            if ($error_code == UPLOAD_ERR_NO_FILE) {
                return redirect()
                    ->back()
                    ->with("warning", "No file was selected")
                    ->withInput();
            }
            throw new \RuntimeException($file->getErrorString());
        }

        $size = $file->getSizeByUnit("mb");

        if ($size > 2) {
            return redirect()
                ->back()
                ->with("warning", "File too large (2 MB)")
                ->withInput();
        }

        $mime = $file->getMimeType();

        if (!in_array($mime, ['image/png', 'image/jpg', 'image/jpeg'])) {
            return redirect()
                ->back()
                ->with("warning", "Invalid file format (PNG or JPG only)")
                ->withInput();
        }

        $file->store('covers');

        $name = $file->getName();

        $post = $this->request->getPost();

        unset($post['upload']);

        $post['poster_file'] = $name;

        $post = new Post($post);

        if ($this->model->protect(false)
            ->insert($post)
        ) {
            return redirect()
                ->to("/admin/posts/show/" . $this->model->getInsertID())
                ->with("info", "post has been added");
        } else {
            return redirect()
                ->back()
                ->with('errors', $this->model->errors())
                ->with("warning", "Invalid data")
                ->withInput();
        }
    }

    public function edit($id)
    {
        $post = $this->getPostOr404($id);

        return view("Admin/Posts/edit", [
            'post' => $post
        ]);
    }

    public function update($id)
    {
        $post = $this->getPostOr404($id);

        $req = $this->request->getPost();

        if (!empty($this->request->getFile("upload"))) {

            $file = $this->request->getFile('upload');

            $error_code = $file->getError();

            if (!$file->isValid()) {
                if ($error_code == UPLOAD_ERR_NO_FILE) {
                    return redirect()
                        ->back()
                        ->with("warning", "No file was selected")
                        ->withInput();
                }
                throw new \RuntimeException($file->getErrorString());
            }

            $size = $file->getSizeByUnit("mb");

            if ($size > 2) {
                return redirect()
                    ->back()
                    ->with("warning", "File too large (2 MB)")
                    ->withInput();
            }

            $mime = $file->getMimeType();

            if (!in_array($mime, ['image/png', 'image/jpg', 'image/jpeg'])) {
                return redirect()
                    ->back()
                    ->with("warning", "Invalid file format (PNG or JPG only)")
                    ->withInput();
            }

            $file->store('covers');

            $name = $file->getName();

            $req['poster_file'] = $name;
        }

        unset($req['upload']);

        $post->fill($req);

        if (!($post->hasChanged())) {

            return redirect()
                ->back()
                ->with("warning", "Nothing to update")
                ->withInput();
        }

        if ($this->model->protect(false)->save($post)) {
            return redirect()
                ->to('/admin/posts/show/' . $id)
                ->with('info', "record has been updated");
        } else {
            return redirect()->back()->with('warning', "Invalid data")->withInput();
        }
    }

    public function delete($id)
    {
        $post = $this->getPostOr404($id);

        if ($this->request->getMethod() == "post") {

            $this->model->delete($id);

            return redirect()->to('/admin/posts')->with('info', 'post has been deleted');
        }

        return view("Admin/Posts/delete", [
            'post' => $post
        ]);
    }

    public function getPostOr404($id)
    {
        $post = $this->model->getPostById($id);

        if ($post == null) {
            throw new PageNotFoundException("Post with id: {$id} Not Found");
        }

        return $post;
    }
}
