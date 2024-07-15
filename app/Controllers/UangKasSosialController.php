<?php

namespace App\Controllers;

use App\Models\ModelKasSosial;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UangKasSosialController extends BaseController
{
    public $ModelKasSosial, $data;
    public function __construct()
    {
        $this->ModelKasSosial = new ModelKasSosial();
        $this->data = [
            'judul' => 'Kas Masuk',
            'subjudul' => '',
            'menu' => 'Kas Masuk',
            'sub-menu' => '',
            'page' => 'uang_kas_sosial/index',
            'data' => $this->ModelKasSosial->findAll(),
        ];
    }
    public function index()
    {
        session()->setFlashdata('edit', FALSE);
        return view('v_template_admin', $this->data);
    }
    public function store()
    {
        $tanggal = $this->request->getPost('tanggal');
        $keterangan = $this->request->getPost('keterangan');
        $kas_masuk = $this->request->getPost('kas_masuk');
        $kas_keluar = $this->request->getPost('kas_keluar');

        if ($tanggal && $keterangan && $kas_masuk) {
            $this->ModelKasSosial->insert([
                'tanggal' => $tanggal,
                'ket' => $keterangan,
                'kas_masuk' => $kas_masuk,
                'kas_keluar' => $kas_keluar,
                'status' => 'active'
            ]);

            session()->setFlashdata('success', 'Data berhasil disimpan');
        } else {
            session()->setFlashdata('error', 'Data gagal disimpan');
        }

        return redirect()->back();
    }
    public function edit($id)
    {
        $data = $this->ModelKasSosial->find($id);
        if (!$data) {
            session()->setFlashdata('error', 'Data tidak ditemukan');
            return redirect()->back();
        }
        session()->setFlashdata('edit', TRUE);
        $this->data['edit'] = $data;
        return view('v_template_admin', $this->data);
    }

    public function update($id)
    {
        $tanggal = $this->request->getPost('tanggal');
        $keterangan = $this->request->getPost('keterangan');
        $kas_masuk = $this->request->getPost('kas_masuk');
        $kas_keluar = $this->request->getPost('kas_keluar');

        if ($tanggal && $keterangan && $kas_masuk) {
            $this->ModelKasSosial->update($id, [
                'tanggal' => $tanggal,
                'ket' => $keterangan,
                'kas_masuk' => $kas_masuk,
                'kas_keluar' => $kas_keluar,
            ]);

            session()->setFlashdata('success', 'Data berhasil diupdate');
        } else {
            session()->setFlashdata('error', 'Data gagal diupdate');
        }

        return redirect()->to(base_url('admin/uang-kas-masjid'));
    }

    public function delete($id)
    {
        $this->ModelKasSosial->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->back();
    }
    public function rekap()
    {
        $this->data['judul'] = "Rekap";
        $this->data['menu'] = "Rekap";
        $this->data['page'] = "uang_kas_sosial/rekap";
        $this->data['total_masuk'] = $this->ModelKasSosial->selectSum('kas_masuk')->first();
        $this->data['total_keluar'] = 0;
        $this->data['total_uang'] = $this->ModelKasSosial->selectSum('kas_masuk')->first();
        return view('v_template_admin', $this->data);
    }
    public function print(){
        $data = [
            'data' => $this->ModelKasSosial->findAll(),
        ];
        return view('uang_kas_sosial/print', $data);
    }
}
