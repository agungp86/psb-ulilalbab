<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Siswa;
use DateTime;

class Excel extends BaseController
{
    public function index()
    {
        //
    }

    protected $provinsi;
    protected $kabupaten;
    protected $kecamatan;
    protected $kelurahan;
    protected $siswa;

    function __construct()
    {
        $this->provinsi = new Provinsi();
        $this->kabupaten = new Kabupaten();
        $this->kecamatan = new Kecamatan();
        $this->kelurahan = new Kelurahan();
        $this->siswa = new Siswa();
    }

    public function downloadExcel()
    {
        $record = $this->siswa->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set table headers
        $sheet->setCellValue('A1', '#')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'Gender')
            ->setCellValue('D1', 'Tempat Lahir')
            ->setCellValue('E1', 'Tanggal Lahir')
            ->setCellValue('F1', 'Nama Orang Tua')
            ->setCellValue('G1', 'Telpon')
            ->setCellValue('H1', 'Alamat')
            ->setCellValue('I1', 'Sekolah Asal')
            ->setCellValue('J1', 'Alamat Sekolah')
            ->setCellValue('K1', 'Jalur')
            ->setCellValue('L1', 'Tahun Ajar')
            ->setCellValue('M1', 'Status Pendaftaran');

        // Add data to the table
        foreach ($record as $index => $k) {
            $row = $index + 2; // Start from row 2 because row 1 is the header
            $sheet->setCellValue('A' . $row, $index + 1)
                ->setCellValue('B' . $row, $k['nama'])
                ->setCellValue('C' . $row, $k['jk'])
                ->setCellValue('D' . $row, $k['tempat_lahir'])
                ->setCellValue('E' . $row, $k['tgl_lahir'])
                ->setCellValue('F' . $row, $k['ortu'])
                ->setCellValue('G' . $row, $k['telp_ortu'])
                ->setCellValue('H' . $row, $this->getAlamatSiswa($k['id']))
                ->setCellValue('I' . $row, $k['nama_sekolah'])
                ->setCellValue('J' . $row, $this->getAlamatSekolah($k['id']))
                ->setCellValue('K' . $row, $k['jalur'])
                ->setCellValue('L' . $row, $k['tahunajar'])
                ->setCellValue('M' . $row, $this->getStageName($k['stage']));
            // ->setCellValue('C' . $row, (new \DateTime($k['created_at']))->format('d-m-y H:i'))
            // ->setCellValue('D' . $row, $k['nama_sekolah'])
            // ->setCellValue('E' . $row, $k['jalur'])
            // ->setCellValue('F' . $row, $this->getStageName($k['stage']));
        }

        // Generate Excel file and prompt download
        $writer = new Xlsx($spreadsheet);
        $date = new \DateTime('now', new \DateTimeZone('Asia/Bangkok')); // Bangkok is in GMT+7
        $filename = 'PSB' . $date->format('YmdHis') . '.xlsx';

          // Generate Excel file and prompt download
        //   $writer = new Xlsx($spreadsheet);
        //   $filename = 'student_data.xlsx';

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1'); // If serving to IE 9
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // Always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer->save('php://output');
        exit;
    }

    private function getStageName($stage)
    {
        switch ($stage) {
            case 0:
                return 'belum bayar';
            case 1:
                return 'sudah bayar';
            case 2:
                return 'terkonfirmasi';
            case 3:
                return 'lolos wawancara';
            case 4:
                return 'diterima';
            default:
                return 'status tidak dikenal';
        }
    }

    private function getAlamatSiswa($id)
    {
        $data = $this->siswa->where('id', $id)->first();
        $detail = $data['detail_alamat'];
        $provinsi =$this->getRegionName('t_provinsi', $data['prov1']); 
        $kabupaten =$this->getRegionName('t_kota', $data['kabko1']); 
        $kecamatan =$this->getRegionName('t_kecamatan', $data['kec1']); 
        $kelurahan =$this->getRegionName('t_kelurahan', $data['kelurahan1']); 

        return '' . $detail . ' ,' . $kelurahan . ' ,' . $kecamatan . ' ,' . $kabupaten . ' ,' . $provinsi;
    }

    private function getAlamatsekolah($id)
    {
        $data = $this->siswa->where('id', $id)->first();
        $provinsi =$this->getRegionName('t_provinsi', $data['prov2']); 
        $kabupaten =$this->getRegionName('t_kota', $data['kabko2']); 
        $kecamatan =$this->getRegionName('t_kecamatan', $data['kec2']); 
        $kelurahan =$this->getRegionName('t_kelurahan', $data['kelurahan2']); 

        return '' . $kelurahan . ' ,' . $kecamatan . ' ,' . $kabupaten . ' ,' . $provinsi;
    }

    private function getRegionName($table, $id)
    {
        $db = \Config\Database::connect();
        $query = $db->table($table)
            ->select('nama')
            ->where('id', $id)
            ->get();

        $result = $query->getRow();

        if ($result) {
            return $result->nama;
        } else {
            return 'No region found with this id.';
        }
    }
}
