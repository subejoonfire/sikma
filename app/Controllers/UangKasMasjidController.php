<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKasMasjid;

class UangKasMasjidController extends BaseController
{
    public $ModelKasMasjid, $data;
    public function __construct()
    {
        $this->ModelKasMasjid = new ModelKasMasjid();
        $this->data = [
            'judul' => 'Kas Masuk',
            'subjudul' => '',
            'menu' => 'Kas Masuk',
            'sub-menu' => '',
            'page' => 'uang_kas_masjid/index',
            'data' => $this->ModelKasMasjid->findAll(),
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
            $this->ModelKasMasjid->insert([
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
        $data = $this->ModelKasMasjid->find($id);
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
            $this->ModelKasMasjid->update($id, [
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
        $this->ModelKasMasjid->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->back();
    }
    public function rekap(){
        $this->data['judul'] = "Rekap";
        $this->data['menu'] = "Rekap";
        $this->data['page'] = "uang_kas_masjid/rekap";
        $this->data['total_masuk'] = $this->ModelKasMasjid->selectSum('kas_masuk')->first();
        $this->data['total_keluar'] = 0;
        $this->data['total_uang'] = $this->ModelKasMasjid->selectSum('kas_masuk')->first();
        return view('v_template_admin', $this->data);
    }
}
