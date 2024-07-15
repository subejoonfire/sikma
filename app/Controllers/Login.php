<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin; // Pastikan penamaan ini benar

class Login extends BaseController
{
    protected $ModelLogin; // Tambahkan deklarasi properti

    public function __construct()
    {
        $this->ModelLogin = new ModelLogin(); // Pastikan penamaan ini sesuai
    }

    public function index()
    {
        $data = [
            'judul' => 'Login',
            'validation' => \Config\Services::validation(), // Perbaikan di sini
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong'
                ]
            ]
        ])) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $CekLogin = $this->ModelLogin->CekUser($email, $password);

            if ($CekLogin) {
                session()->set('nama_user', $CekLogin['nama_user']);
                return redirect()->to(base_url('admin'));
            } else {
                session()->setFlashdata('gagal', 'Email Atau Password Salah !!!');
                return redirect()->to(base_url('Login'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('login'))->withInput()->with('validation', \Config\Services::validation());
        }
    }

    public function LogOut()
    {
        session()->remove('nama_user');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Anda Berhasil Logout !!!');
        return redirect()->to(base_url('Login'));
    }
}
