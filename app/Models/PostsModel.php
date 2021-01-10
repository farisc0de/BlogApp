<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table = "posts";

    protected $allowedFields = [
        'title',
        'sub_title',
        'content',
        'user_id'
    ];

    protected $returnType = 'App\Entities\Post';

    protected $useTimestamps = true;

    public function getPostById($id)
    {
        $res = $this->join("users", "posts.user_id = users.id")
            ->select("posts.*, users.username")
            ->find($id);
        return $res;
    }

    public function getAllPosts()
    {
        $res = $this->join("users", "posts.user_id = users.id")
            ->select("posts.*, users.username")
            ->orderBy('posts.id')
            ->paginate(5);
        return $res;
    }
}
