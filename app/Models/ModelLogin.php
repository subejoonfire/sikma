<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table = 'tbl_user'; // Tentukan nama tabel jika belum

    public function CekUser($email, $password)
    {
        return $this->db->table($this->table)
            ->where('email', $email) // Perbaikan di sini
            ->where('password', $password) // Perbaikan di sini
            ->get()
            ->getRowArray();
    }
}
