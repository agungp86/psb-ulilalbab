<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Files as FilesModel;
use App\Models\Siswa;
use Dompdf\Dompdf;
use ZipArchive;

class Download extends BaseController
{
    protected $files;
    protected $siswa;

    public function __construct()
    {
        $this->files = new FilesModel();
        $this->siswa = new Siswa();
    }

    public function bulk()
    {
        $ids = $this->request->getPost('ids');
        if (!$ids) {
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih.');
        }

        $idsArray = array_filter(array_map('trim', explode(',', $ids)));

        $zipDir = WRITEPATH . 'downloads' . DIRECTORY_SEPARATOR;
        if (!is_dir($zipDir)) {
            mkdir($zipDir, 0755, true);
        }

        $zipFile = $zipDir . 'berkas_' . date('YmdHis') . '.zip';
        $zip = new ZipArchive();
        if ($zip->open($zipFile, ZipArchive::CREATE) !== true) {
            return redirect()->back()->with('error', 'Gagal membuat file ZIP.');
        }

        foreach ($idsArray as $id) {
            $siswa = $this->siswa->find($id);
            if (!$siswa) {
                continue;
            }

            $folderName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $siswa['nama']);
            
            // Ambil semua file siswa
            $files = $this->files->where('id_siswa', $id)->findAll();
            foreach ($files as $f) {
                $jenis = strtolower($f['jenis']);
                $fileName = $jenis . '.' . pathinfo($f['path'], PATHINFO_EXTENSION);

                $candidates = [
                    FCPATH . 'uploads/' . $jenis . '/' . $f['path'],
                    ROOTPATH . 'uploads/' . $jenis . '/' . $f['path'],
                    WRITEPATH . 'uploads/' . $jenis . '/' . $f['path'],
                    FCPATH . 'uploads/' . $f['path'],
                    ROOTPATH . 'uploads/' . $f['path'],
                    WRITEPATH . 'uploads/' . $f['path'],
                ];

                foreach ($candidates as $path) {
                    if (is_file($path)) {
                        $zip->addFile($path, $folderName . '/' . $fileName);
                        break;
                    }
                }
            }

            // Generate form PDF untuk siswa ini
            $pdfPath = WRITEPATH . 'downloads/' . $folderName . '_form.pdf';
            $this->generatePDF($siswa, $pdfPath);
            if (is_file($pdfPath)) {
                $zip->addFile($pdfPath, $folderName . '/form.pdf');
            }
        }

        $zip->close();

        // Hapus PDF sementara
        foreach ($idsArray as $id) {
            $siswa = $this->siswa->find($id);
            if ($siswa) {
                $folderName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $siswa['nama']);
                @unlink(WRITEPATH . 'downloads/' . $folderName . '_form.pdf');
            }
        }

        return $this->response->download($zipFile, null)->setFileName(basename($zipFile));
    }

    private function generatePDF($siswa, $pdfPath)
    {
        $alamatSiswa = $this->getAlamatSiswa($siswa['id']);
        $alamatSekolah = $this->getAlamatSekolah($siswa['id']);

        $html = '
        <html>
        <head>
            <style>
                body { font-family: sans-serif; font-size: 12px; }
                .header { display: flex; align-items: center; }
                .header img { height: 60px; margin-right: 15px; }
                .title { font-size: 20px; font-weight: bold; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                td { padding: 5px; vertical-align: top; }
            </style>
        </head>
        <body>
            <div class="header">
                <div class="title">Formulir Pendaftaran Siswa</div>
            </div>
            <table>
                <tr><td><b>Nama</b></td><td>: ' . $siswa['nama'] . '</td></tr>
                <tr><td><b>Gender</b></td><td>: ' . $siswa['jk'] . '</td></tr>
                <tr><td><b>Tempat, Tanggal Lahir</b></td><td>: ' . $siswa['tempat_lahir'] . ', ' . $siswa['tgl_lahir'] . '</td></tr>
                <tr><td><b>Orang Tua</b></td><td>: ' . $siswa['ortu'] . '</td></tr>
                <tr><td><b>Telp Ortu</b></td><td>: ' . $siswa['telp_ortu'] . '</td></tr>
                <tr><td><b>Alamat Siswa</b></td><td>: ' . $alamatSiswa . '</td></tr>
                <tr><td><b>Asal Sekolah</b></td><td>: ' . $siswa['nama_sekolah'] . '</td></tr>
                <tr><td><b>Alamat Sekolah</b></td><td>: ' . $alamatSekolah . '</td></tr>
                <tr><td><b>Jalur</b></td><td>: ' . $siswa['jalur'] . '</td></tr>
                <tr><td><b>Tahun Ajaran</b></td><td>: ' . $siswa['tahunajar'] . '</td></tr>
            </table>
        </body>
        </html>
        ';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        file_put_contents($pdfPath, $dompdf->output());
    }

    private function getAlamatSiswa($id)
    {
        $data = $this->siswa->find($id);
        $provinsi = $this->getRegionName('t_provinsi', $data['prov1']);
        $kabupaten = $this->getRegionName('t_kota', $data['kabko1']);
        $kecamatan = $this->getRegionName('t_kecamatan', $data['kec1']);
        $kelurahan = $this->getRegionName('t_kelurahan', $data['kelurahan1']);
        return $data['detail_alamat'] . ', ' . $kelurahan . ', ' . $kecamatan . ', ' . $kabupaten . ', ' . $provinsi;
    }

    private function getAlamatSekolah($id)
    {
        $data = $this->siswa->find($id);
        $provinsi = $this->getRegionName('t_provinsi', $data['prov2']);
        $kabupaten = $this->getRegionName('t_kota', $data['kabko2']);
        $kecamatan = $this->getRegionName('t_kecamatan', $data['kec2']);
        $kelurahan = $this->getRegionName('t_kelurahan', $data['kelurahan2']);
        return $kelurahan . ', ' . $kecamatan . ', ' . $kabupaten . ', ' . $provinsi;
    }

    private function getRegionName($table, $id)
    {
        $db = \Config\Database::connect();
        $query = $db->table($table)->select('nama')->where('id', $id)->get();
        $result = $query->getRow();
        return $result ? $result->nama : '';
    }
}
