<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Files;

class Uploads extends BaseController
{
    protected $files;

    public function __construct()
    {
        $this->files = new Files();
    }

    public function index($id)
    {
        $data['id'] = $id;
    
        // Ambil semua file berdasarkan id_siswa
        $fileData = $this->files->where('id_siswa', $id)->findAll();
    
        // Ubah jadi array dengan key berdasarkan 'jenis'
        $berkas = [];
        foreach ($fileData as $row) {
            $berkas[$row['jenis']] = $row['path'];
        }
    
        $data['berkas'] = $berkas;
    
        return view('Notif', [
            'content' => view('UploadBerkas', $data),
            'judul' => 'Upload Berkas Pendaftaran'
        ]);
    }

    public function uploadFoto()
    {
        return $this->handleUpload('foto', 'foto', 'image/jpeg', 'foto');
    }

    public function uploadAkta()
    {
        return $this->handleUpload('akta', 'akta', 'application/pdf', 'akta');
    }

    public function uploadKk()
    {
        return $this->handleUpload('kk', 'kk', 'application/pdf', 'kk');
    }

    public function uploadSurat()
    {
        return $this->handleUpload('surat', 'surat', 'application/pdf', 'surat');
    }

    private function handleUpload($field, $jenis, $allowedMime, $folder)
    {
        $file = $this->request->getFile($field);
        $id = $this->request->getPost('id');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getMimeType() == $allowedMime) {
                // Delete old file if exists
                $this->deleteExisting($jenis, $id);

                $newName = $file->getRandomName();
                $file->move('uploads/' . $folder, $newName);

                // Save to DB
                $this->files->insert([
                    'jenis' => $jenis,
                    'path' => $newName,
                    'id_siswa' => $id
                ]);

                return redirect()->to(previous_url())->with('success', ucfirst($jenis) . ' berhasil diupload.');
            } else {
                return redirect()->to(previous_url())->with('error', 'Hanya file bertipe ' . $allowedMime . ' yang diizinkan untuk ' . ucfirst($jenis) . '.');
            }
        } else {
            return redirect()->to(previous_url())->with('error', 'Gagal mengupload file ' . ucfirst($jenis) . '.');
        }
    }

    private function deleteExisting($jenis, $id)
    {
        $pathFolder = 'uploads/' . $jenis . '/';
        $existingFile = $this->files
            ->where('id_siswa', $id)
            ->where('jenis', $jenis)
            ->first();

        if ($existingFile && $existingFile['path']) {
            $fullPath = $pathFolder . $existingFile['path'];
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }

        $this->files->where('id_siswa', $id)->where('jenis', $jenis)->delete();
    }

    public function getBerkasJson($id)
{
    // Ambil semua file berdasarkan id_siswa
    $fileData = $this->files->where('id_siswa', $id)->findAll();

    // Ubah ke format berkas[jenis] = path
    $berkas = [];
    foreach ($fileData as $row) {
        $berkas[$row['jenis']] = $row['path'];
    }

    return $this->response->setJSON($berkas);
}
}