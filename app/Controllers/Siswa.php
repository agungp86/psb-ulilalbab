<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Siswa as SiswaModel;
use App\Models\Files;

class Siswa extends BaseController
{
    protected $siswa;
    protected $files;

    public function __construct()
    {
        $this->siswa = new SiswaModel();
        $this->files = new Files();
    }

    public function deleteBulk()
    {
        $ids = $this->request->getPost('ids');

        if (!$ids) {
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih.');
        }

        $idsArray = explode(',', $ids);

        foreach ($idsArray as $id) {
            // Hapus file fisik
            $files = $this->files->where('id', $id)->findAll();
            foreach ($files as $file) {
                $filePath = FCPATH . 'uploads/' . $file['jenis'] . '/' . $file['nama_file'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Hapus data di tabel files
            $this->files->where('id', $id)->delete();

            // Hapus data siswa
            $this->siswa->delete($id);
        }

        return redirect()->back()->with('success', 'Data siswa dan berkas berhasil dihapus.');
    }
}
