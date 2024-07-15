<?php

namespace App\Controllers;

use App\Models\ModelKasMasjid;
use App\Models\ModelKasSosial;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LaporanKasController extends BaseController
{
    public $ModelKasMasjid, $ModelKasSosial, $data;
    public function __construct()
    {
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->ModelKasSosial = new ModelKasSosial();
        $this->data = [
            'judul' => 'Laporan Kas',
            'subjudul' => '',
            'menu' => 'Laporan Kas',
            'sub-menu' => '',
        ];
    }
    public function masjid()
    {
        $this->data['page'] = 'laporan_kas/masjid';
        $this->data['data'] = $this->ModelKasMasjid->findAll();
        return view('v_template_admin', $this->data);
    }
    public function sosial()
    {
        $this->data['page'] = 'laporan_kas/sosial';
        $this->data['data'] = $this->ModelKasSosial->findAll();
        return view('v_template_admin', $this->data);
    }
    public function printMasjid()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        if (empty($bulan) && empty($tahun)) {
            $data = [
                'data' => $this->ModelKasMasjid->findAll(),
            ];
        } elseif (empty($bulan)) {
            $data = [
                'data' => $this->ModelKasMasjid
                    ->where('EXTRACT(YEAR FROM tanggal) =', $tahun)
                    ->findAll(),
            ];
        } elseif (empty($tahun)) {
            $data = [
                'data' => $this->ModelKasMasjid
                    ->where('EXTRACT(MONTH FROM tanggal) =', $bulan)
                    ->findAll(),
            ];
        } else {
            $data = [
                'data' => $this->ModelKasMasjid
                    ->where('EXTRACT(MONTH FROM tanggal) =', $bulan)
                    ->where('EXTRACT(YEAR FROM tanggal) =', $tahun)
                    ->findAll(),
            ];
        }

        return view('uang_kas_masjid/print', $data);
    }

    public function printSosial()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        if (empty($bulan) && empty($tahun)) {
            $data = [
                'data' => $this->ModelKasSosial->findAll(),
            ];
        } elseif (empty($bulan)) {
            $data = [
                'data' => $this->ModelKasMasjid
                    ->where('EXTRACT(YEAR FROM tanggal) =', $tahun)
                    ->findAll(),
            ];
        } elseif (empty($tahun)) {
            $data = [
                'data' => $this->ModelKasSosial
                    ->where('EXTRACT(MONTH FROM tanggal) =', $bulan)
                    ->findAll(),
            ];
        } else {
            $data = [
                'data' => $this->ModelKasSosial
                    ->where('EXTRACT(MONTH FROM tanggal) =', $bulan)
                    ->where('EXTRACT(YEAR FROM tanggal) =', $tahun)
                    ->findAll(),
            ];
        }
        return view('uang_kas_sosial/print', $data);
    }
}
