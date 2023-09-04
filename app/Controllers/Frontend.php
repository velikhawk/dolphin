<?php

namespace App\Controllers;

class Frontend extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Frontend'
        ];

        return view('frontend/index', $data);
    }
}
