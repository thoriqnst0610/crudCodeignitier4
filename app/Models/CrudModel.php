<?php

namespace App\Models;

use CodeIgniter\Model;

class CrudModel extends Model
{
    protected $table      = 'manusia'; // Nama tabel
    protected $primaryKey = 'id';    // Primary key

    protected $allowedFields = ['nama', 'alamat', 'photo']; // Kolom yang boleh diisi

    // CRUD Database Guru

    // Fungsi untuk mengambil data dengan pagination
    public function getUsersPaginated($limit, $offset)
    {
        return $this->orderBy('id', 'ASC')
                    ->findAll($limit, $offset); // Mengambil data dengan limit dan offset
    }

    // Fungsi untuk menghitung total data (digunakan untuk pagination)
    public function countUsers()
    {
        return $this->countAllResults(); // Menghitung jumlah total data
    }
}