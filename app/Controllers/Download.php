<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use ZipArchive;
use App\Models\Files as FilesModel;
use App\Models\Siswa;
use Mpdf\Mpdf;

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
        helper('filesystem');

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

        $missingFiles = [];

        foreach ($idsArray as $id) {
            $siswa = $this->siswa->find($id);
            if (!$siswa) continue;

            // Folder per siswa dalam ZIP
            $folderName = 'berkas_pendaftaran-' . preg_replace('/[^A-Za-z0-9_\-]/', '_', $siswa['nama']);

            // === File berdasarkan jenis ===
            $files = $this->files->where('id_siswa', $id)->findAll();
            foreach ($files as $f) {
                $ext = pathinfo($f['path'], PATHINFO_EXTENSION);
                $jenis = strtolower($f['jenis']);
                $fileNameInZip = $folderName . '/' . $jenis . '.' . $ext;

                $candidates = [
                    FCPATH . 'uploads/' . $jenis . '/' . $f['path'],
                    ROOTPATH . 'uploads/' . $jenis . '/' . $f['path'],
                    WRITEPATH . 'uploads/' . $jenis . '/' . $f['path'],
                ];

                $found = false;
                foreach ($candidates as $path) {
                    if (is_file($path)) {
                        $zip->addFile($path, $fileNameInZip);
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $missingFiles[] = $fileNameInZip;
                }
            }

            // === Bukti Transfer ===
            if (!empty($siswa['bukti_tf'])) {
                $buktiExt = pathinfo($siswa['bukti_tf'], PATHINFO_EXTENSION);
                $buktiCandidates = [
                    FCPATH . 'uploads/buktitf/' . $siswa['bukti_tf'],
                    ROOTPATH . 'uploads/buktitf/' . $siswa['bukti_tf'],
                    WRITEPATH . 'uploads/buktitf/' . $siswa['bukti_tf'],
                ];
                $foundBukti = false;
                foreach ($buktiCandidates as $buktiPath) {
                    if (is_file($buktiPath)) {
                        $zip->addFile($buktiPath, $folderName . '/bukti_transfer.' . $buktiExt);
                        $foundBukti = true;
                        break;
                    }
                }
                if (!$foundBukti) {
                    $missingFiles[] = $folderName . '/bukti_transfer.' . $buktiExt;
                }
            }

            // === Form PDF ===
            $pdfPath = WRITEPATH . 'temp/form_' . $id . '.pdf';
            if (!is_dir(dirname($pdfPath))) {
                mkdir(dirname($pdfPath), 0755, true);
            }

            $this->generateFormPDF($siswa, $pdfPath);
            if (is_file($pdfPath)) {
                $zip->addFile($pdfPath, $folderName . '/form.pdf');
            } else {
                $missingFiles[] = $folderName . '/form.pdf';
            }
        }

        $zip->close();

        if (!is_file($zipFile)) {
            return redirect()->back()->with('error', 'ZIP gagal dibuat.');
        }

        if (!empty($missingFiles)) {
            session()->setFlashdata('warning', 'Beberapa file tidak ditemukan: ' . implode(', ', array_slice($missingFiles, 0, 10)));
        }

        register_shutdown_function(function () use ($zipFile) {
            @unlink($zipFile);
        });

        return $this->response->download($zipFile, null)->setFileName(basename($zipFile));
    }

    /**
     * Membuat PDF Form Siswa (A4 Portrait)
     */
private function generateFormPDF($siswa, $outputPath)
{
    $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);


        // Logo sekolah
        $logoPath = FCPATH . 'assets/img/logo.png';

        // Ambil alamat lengkap
        $alamatSiswa = $this->getAlamatLengkap($siswa['detail_alamat'], $siswa['prov1'], $siswa['kabko1'], $siswa['kec1'], $siswa['kelurahan1']);
        $alamatSekolah = $this->getAlamatLengkap('', $siswa['prov2'], $siswa['kabko2'], $siswa['kec2'], $siswa['kelurahan2']);

        $html = '
        <div style="text-align:center;">
            <img src="' . $logoPath . '" height="80">
            <h2>FORM PENDAFTARAN</h2>
            <h3>' . htmlspecialchars($siswa['nama']) . '</h3>
            <hr>
        </div>
        <h4>Data Siswa</h4>
        <p>Nama: ' . $siswa['nama'] . '</p>
        <p>Gender: ' . $siswa['jk'] . '</p>
        <p>Tempat & Tanggal Lahir: ' . $siswa['tempat_lahir'] . ', ' . $siswa['tgl_lahir'] . '</p>
        <p>Orang Tua: ' . $siswa['ortu'] . '</p>
        <p>Telpon: ' . $siswa['telp_ortu'] . '</p>

        <h4>Alamat Siswa</h4>
        <p>' . $alamatSiswa . '</p>

        <h4>Data Sekolah Asal</h4>
        <p>Nama Sekolah: ' . $siswa['nama_sekolah'] . '</p>
        <p>Alamat Sekolah: ' . $alamatSekolah . '</p>

        <h4>Informasi Lain</h4>
        <p>Jalur: ' . $siswa['jalur'] . '</p>
        <p>Tahun Ajaran: ' . $siswa['tahunajar'] . '</p>
        ';

        $mpdf->WriteHTML($html);
        $mpdf->Output($outputPath, \Mpdf\Output\Destination::FILE);
    }

    private function getAlamatLengkap($detail, $provId, $kabId, $kecId, $kelId)
    {
        $prov = $this->getRegionName('t_provinsi', $provId);
        $kab = $this->getRegionName('t_kota', $kabId);
        $kec = $this->getRegionName('t_kecamatan', $kecId);
        $kel = $this->getRegionName('t_kelurahan', $kelId);

        return trim($detail . ', ' . $kel . ', ' . $kec . ', ' . $kab . ', ' . $prov, ', ');
    }

    private function getRegionName($table, $id)
    {
        $db = \Config\Database::connect();
        $row = $db->table($table)->select('nama')->where('id', $id)->get()->getRow();
        return $row ? $row->nama : '';
    }
}
