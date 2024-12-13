<?php

namespace App\Controllers;
use App\Models\TugasModel;
use App\Libraries\MyLibrary;
use Config\Services;

class Test extends BaseController
{

    public function test(): string
    {
        $tugasModel = new TugasModel();

        // Menambahkan data baru
        // $tugasModel->save([
        //     'id_guru' => 'codeignitier',
        //     'nama_sekolah'  => 'Codeignitier',
        //     'nama_guru' => 'john@example.com',
        //     'nuptk' => 'Codeignitier',
        //     'nip' => 'Codeignitier',
        //     'status_keguruan' => 'Pns'
        // ]);

        // return "Data berhasil ditambahkan!";

        // Membuat instance model
        $tugasModel = new TugasModel();

        // Mengambil semua data guru dari model
        $data['gurus'] = $tugasModel->getAllGuru();

        return view('test',$data);
    }

    public function belajarHelper():string
    {
        // Memuat helper
        helper('my');

        // Menggunakan fungsi dari helper
        $formattedDate = format_date('2024-12-01');
        $slug = create_slug('Hello World!');

        return view('test',[
            'date' => $formattedDate,
            'slug' => $slug
        ]);
    }

    public function belajarLibrary():string
    {
        // Memuat library
        $myLibrary = new MyLibrary('John');

        // Menggunakan fungsi dari library
        $greeting = $myLibrary->greet();
        return view('test',['greeting' => $greeting]);
    }

    public function belajarMiddleware():string
    {
        return "ini adalah berhasil login";
    }

    public function login():string
    {

        //latihan membuat session dan mengambil session
        $session = Services::session();
        $session->set('username', 'thoriq');
        $username = $session->get('username');

        //latihan membuat cookie
        $response = Services::response();
        $response->setCookie('password', 'thoriq', time() + 3600);

        $response = $this->request->getCookie('password');
        return "anda login dulu" ." ". $username." cookie ". $response;
    }

    public function authenticate()
    {

        $session = Services::session();
        $session->set('username', 'thoriq');
      
    }

    public function upload()
    {
        // Mengambil instance dari class Upload
        $validation =  \Config\Services::validation();
        $file = $this->request->getFile('file');

        // Validasi file upload
        if (!$file->isValid()) {
            // Jika file tidak valid, tampilkan error
            return redirect()->back()->with('error', 'File tidak valid!');
        }

        // Tentukan direktori penyimpanan file
        $filePath = WRITEPATH . 'uploads/';
        $newName = $file->getRandomName(); // Nama file random

        // Cek apakah file berhasil dipindahkan
        if ($file->move($filePath, $newName)) {
            return redirect()->to('/uploadfile')->with('success', 'File berhasil diupload!');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupload file.');
        }
    }

    public function uploadfile():string
    {
        return view('upload');
    }
}
