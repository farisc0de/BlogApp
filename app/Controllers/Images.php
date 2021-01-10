<?php

namespace App\Controllers;

class Images extends BaseController
{
    public function view($filename)
    {
        $path = WRITEPATH . 'uploads/images/' . $filename;

        $finfo = new \finfo(FILEINFO_MIME);

        $type = $finfo->file($path);

        header("Content-Type: {$type}");
        header("Content-Length: " . filesize($path));

        readfile($path);

        exit;
    }
}
