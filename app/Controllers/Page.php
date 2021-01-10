<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function view($slug)
    {
        helper('inflector');

        return view('App/Page/' . $slug);
    }
}
