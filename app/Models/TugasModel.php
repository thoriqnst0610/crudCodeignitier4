<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $table      = 'guru'; // Nama tabel
    protected $primaryKey = 'id_guru';    // Primary key

    protected $allowedFields = ['id_guru', 'nama_sekolah', 'nama_guru', 'nuptk', 'nip', 'status_keguruan']; // Kolom yang boleh diisi

     // Fungsi untuk mengambil semua data dari tabel guru
     public function getAllGuru()
     {
         return $this->findAll(); // Mengambil semua data dari tabel guru
     }
     
     // Fungsi untuk mengambil data guru berdasarkan id
     public function getGuruById($id)
     {
         return $this->where('id_guru', $id)->first(); // Mengambil satu data berdasarkan id
     }
}