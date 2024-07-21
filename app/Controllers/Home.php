<?php

namespace App\Controllers;

use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Siswa;
use DateTime;

class Home extends BaseController
{
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
    public function index(): string
    {
        return view('Beranda');
    }

    function signUp()
    {
        return view('Form');
    }

    function formPost()
    {
        $data = $this->request->getPost();
        $siswa = array(
            'nama' => $data['nama'],
            'jk' => $data['jk'],
            'jalur' => $data['jalur'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tgl_lahir' => $data['tanggal_lahir'],
            'nisn' => $data['nomor_identitas'],
            'ortu' => $data['nama_orang_tua'],
            'telp_ortu' => $data['telepon_orang_tua'],
            'prov1' => $data['provinsi_siswa'],
            'kabko1' => $data['kabupaten_siswa'],
            'kec1' => $data['kecamatan_siswa'],
            'kelurahan1' => $data['kelurahan_siswa'],
            'detail_alamat' => $data['alamat'],
            'nama_sekolah' => $data['nama_sekolah'],
            'prov2' => $data['provinsi_sekolah'],
            'kabko2' => $data['kabupaten_sekolah'],
            'kec2' => $data['kecamatan_sekolah'],
            'kelurahan2' => $data['kelurahan_sekolah']
        );

        $duplikat =  $this->siswa->where('nama', $data['nama'])->where('ortu', $data['nama_orang_tua'])->first();
        if ($duplikat == null) {
            $this->siswa->insert($siswa);
            $siswa_id = $this->siswa->getInsertID();
            $noreg = $this->noreg($siswa_id, $data['telepon_orang_tua']);
            $this->siswa->where('id', $siswa_id)->set('noreg', $noreg)->update();

            echo "data berhasil disimpan dengan nomor registrasi " . $noreg;
        } else {
            echo "Anda sudah terdaftar sebelumnya dengan nomor registrasi " . $duplikat['noreg'];
        }


        // echo "id Siswa = " . $siswa_id . " Id siswa ".$noreg;
    }

    function noreg($id, $telp)
    {
        // get tanggal hari ini 
        $date = new DateTime(); // Replace with 'today' if you want the current date

        $month = str_pad($date->format('m'), 2, '0', STR_PAD_LEFT);
        $day = str_pad($date->format('d'), 2, '0', STR_PAD_LEFT);
        $result = $month . $day;

        // get id data 
        $formatted_number = str_pad($id, 2, '0', STR_PAD_LEFT);

        // get 2 digit no telp ortu 
        $formatted_telp = substr($telp, -2);

        return $result . $formatted_number . $formatted_telp;
    }

    function checkRegistrasi()
    {
        $noreg = $this->request->getPost('noreg');
        $data = $this->siswa->where('noreg', $noreg)->first();
        if ($data == null) {
            echo "data tidak ditemukan";
        } else {
            d($data);
        }
    }

    function getProvinsi()
    {
        return json_encode($this->provinsi->findAll());
    }
}
