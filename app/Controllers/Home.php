<?php

namespace App\Controllers;

use App\Models\PostsModel;

class Home extends BaseController
{
	public function index()
	{
		$posts = new PostsModel();



		return view('App/Home', [
			'posts' => $posts->getAllPosts(),
			'pages' => $posts->pager
		]);
	}
}
