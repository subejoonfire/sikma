<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
        ];
        return view('v_template', $data);
    }
    public function kas()
    {
        $ModelKasMasjid = new \App\Models\ModelKasMasjid();
        $ModelKasSosial = new \App\Models\ModelKasSosial();
        $data = [
            'ModelKasMasjid' => $ModelKasMasjid->findAll(),
            'ModelKasSosial' => $ModelKasSosial->findAll(),
            'judul' => 'Home',
            'page' => 'v_kas',
        ];
        return view('v_template', $data);
    }
}
