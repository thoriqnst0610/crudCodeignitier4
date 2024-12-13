<?php

namespace App\Controllers;

use App\Models\CrudModel;
use CodeIgniter\Files\File;

class Crud extends BaseController
{

    public function menampilkanData(): string
    {

        // $crudModel = new CrudModel();
        // $data['manusia'] = $crudModel->findAll();

        // Ambil model
        $userModel = new crudModel();
        
        // Menentukan jumlah data per halaman
        $perPage = 1;
        
        // Ambil halaman saat ini (default halaman pertama jika tidak ada)
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        
        // Hitung offset berdasarkan halaman
        $offset = ($page - 1) * $perPage;
        
        // Ambil data dengan pagination
        $users = $userModel->getUsersPaginated($perPage, $offset);
        
        // Hitung total data untuk pagination
        $totalUsers = $userModel->countUsers();
        
        // Set konfigurasi pagination
        $pager = \Config\Services::pager();
        $pager->makeLinks($page, $perPage, $totalUsers);


        return view('menampilkandata', [ 'manusia' => $users,
        'pager' => $pager
    ]);
    }

    public function menambahData()
    {

        $crudModel = new CrudModel();

        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');

        $validation = \config\Services::validation();
        $fileProfil = $this->request->getFile('profil');

        //cek apakah file valid
        if (!$fileProfil->isValid()) {
            return redirect()->back()->with('error', 'Gagal mengupload file.');
        }

        //atur tempat upload dan buat nama random
        $tempatFile = WRITEPATH . '/uploads';
        $namaFile = $fileProfil->getRandomName();

        //cek apakah file sudah terupload
        if ($fileProfil->move($tempatFile, $namaFile)) {

            $data = [
                'nama' => $nama,
                'alamat' => $alamat,
                'photo' => $namaFile
            ];

            $crudModel->save($data);

            return redirect()->to('/menampilkanData')->with('success', 'File berhasil diupload!');
        } else {

            return redirect()->back()->with('error', 'Gagal mengupload file.');
        }
    }

    public function mengeditData()
    {

        $crudModel = new CrudModel();

        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $fileProfil = $this->request->getFile('profil');
        $fileProfilTeks = $this->request->getPost('profilTeks');

        //cek apakah file valid
        if (!$fileProfil->isValid()) {

            $data = [
                'nama' => $nama,
                'alamat' => $alamat
            ];

            $crudModel->update($id, $data);
            if ($crudModel->affectedRows() > 0) {

                return redirect()->to('/menampilkanData')->with('success', 'File berhasil diupload!');
            }
        } else {

            //atur tempat upload dan buat nama random
            $tempatFile = WRITEPATH . '/uploads';
            $namaFile = $fileProfil->getRandomName();

            //cek apakah file sudah terupload
            if ($fileProfil->move($tempatFile, $namaFile)) {
                $data = [
                    'nama' => $nama,
                    'alamat' => $alamat,
                    'photo' => $namaFile
                ];

                $crudModel->update($id, $data);
                if ($crudModel->affectedRows() > 0) {

                    return redirect()->to('/menampilkanData')->with('success', 'File berhasil diupload!');
                }
            } else {

                return redirect()->back()->with('error', 'Gagal mengupload file.');
            }
        }
    }

    public function menghapusData(string $id) 
    {

        $crudModel = new CrudModel();

        if($crudModel->delete($id)){

            return redirect()->to('/menampilkanData')->with('success', 'Berhasil menghapus Data');

        }else{

            return redirect()->back()->with('error', 'Gagal Menghapus Data.');

        }

    }

    public function mengambilGambar($filename)
    {
        // Tentukan path gambar di folder writable/uploads
        $filepath = WRITEPATH . 'uploads/' . $filename;

        // Cek apakah file gambar ada
        if (!is_file($filepath)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Gambar tidak ditemukan.");
        }

        // Ambil tipe MIME gambar
        $file = new File($filepath);
        $mimeType = $file->getMimeType();

        // Kirim gambar ke browser dengan tipe MIME yang sesuai
        return $this->response->setHeader('Content-Type', $mimeType)
            ->setBody(file_get_contents($filepath));
    }
}
