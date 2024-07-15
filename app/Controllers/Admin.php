<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => '',
            'menu' => 'Dashboard',
            'sub-menu' => '',
            'page' => 'v_Dashboard',

        ];
        return view('v_template_admin', $data);
    }
}
