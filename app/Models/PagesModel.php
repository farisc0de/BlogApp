<?php

namespace App\Models;

use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = "pages";

    protected $allowedFields = [
        'title',
        'content',
        'user_id'
    ];

    protected $returnType = 'App\Entities\Page';

    protected $useTimestamps = true;

    public function getPageBySlug($slug)
    {
        $res = $this->where('slug', $slug)->first();

        return $res;
    }
}
