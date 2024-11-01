<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Files;

class Uploads extends BaseController
{
    public function index($id)
    {
        $data['id'] = $id;
        return view('Notif', [
            'content' => view('UploadBerkas',$data),
            'judul' => 'Upload Berkas Pendaftaran'
        ]);
    }

    // Handle Foto Upload
    public function uploadFoto()
    {
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            if ($file->getMimeType() == 'image/jpeg') {
                // Rename the file
                $newName = $file->getRandomName();
                // Move the file to the directory
                $file->move('uploads/foto', $newName);

                // Store the file path in the database or take other actions as needed
                // Example: $this->model->save(['foto' => $newName]);

                 return redirect()->to(previous_url());
                //  echo "upload sukses";
            } else {
               echo 'Only JPEG files are allowed for Foto.';
            }
        }
    }

    // Handle Fotocopy Akta Upload
    public function uploadAkta()
    {
        $file = $this->request->getFile('akta');
        if ($file->isValid() && !$file->hasMoved()) {
            if ($file->getMimeType() == 'application/pdf') {
                // Rename the file
                $newName = $file->getRandomName();
                // Move the file to the directory
                $file->move('uploads/akta', $newName);

                // Store the file path in the database or take other actions as needed
                // Example: $this->model->save(['akta' => $newName]);

                 return redirect()->to(previous_url());
            } else {
               echo 'Only PDF files are allowed for Fotocopy Akta.';
            }
        }
    }

    // Handle Fotocopy KK Upload
    public function uploadKk()
    {
        $file = $this->request->getFile('kk');
        if ($file->isValid() && !$file->hasMoved()) {
            if ($file->getMimeType() == 'application/pdf') {
                // Rename the file
                $newName = $file->getRandomName();
                // Move the file to the directory
                $file->move('uploads/kk', $newName);

                // Store the file path in the database or take other actions as needed
                // Example: $this->model->save(['kk' => $newName]);

                 return redirect()->to(previous_url());
            } else {
               echo 'Only PDF files are allowed for Fotocopy KK.';
            }
        }
    }

    // Handle Surat Keterangan Upload
    public function uploadSurat()
    {
        $file = $this->request->getFile('surat');
        if ($file->isValid() && !$file->hasMoved()) {
            if ($file->getMimeType() == 'application/pdf') {
                // Rename the file
                $newName = $file->getRandomName();
                // Move the file to the directory
                $file->move('uploads/surat', $newName);

                // Store the file path in the database or take other actions as needed
                // Example: $this->model->save(['surat' => $newName]);

                 return redirect()->to(previous_url());
            } else {
               echo 'Only PDF files are allowed for Surat Keterangan.';
            }
        }
    }
}
