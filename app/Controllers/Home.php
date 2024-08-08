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
        return view('Beranda2');
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

            // echo "data berhasil disimpan dengan nomor registrasi " . $noreg;
            $data['noreg'] = $noreg;
            $content = array(
                'content'   => view('RegSukses', $data),
                'judul'     => 'Data Berhasil Disimpan'
            );
            return view('Notif', $content);
        } else {
            $content = array(
                'content'   => view('Duplikat', $duplikat),
                'judul'     => 'Duplikasi Data'
            );

            return view('Notif', $content);
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
            if ($data['stage'] == 0) {
                return view('UploadBuktiTf', $data);
            } elseif ($data['stage'] == 1) {
                $content = array(
                    'content' => view('BuktiTfSukses'),
                    'judul' => 'Bukti Tranfer Berhasil Diupload'
                );
                return view('Notif', $content);
            } elseif ($data['stage'] == 2) {
                $content = array(
                    'content' => view('Verified'),
                    'judul' => 'Pendaftaran dan pembayaran diverifikas'
                );
                return view('Notif', $content);
            } elseif ($data['stage'] == 3) {
                $this->coba();
            } else {
                echo "Data tidak ditemukan, anda siapa?";
            }
        }
    }

    function BuktiTf()
    {
        $file = $this->request->getFile('bukti');
        $data = array(
            'noreg' => $this->request->getPost('par1'),
            'tgl_lahir' => $this->request->getPost('par2')
        );
        if ($file->isValid()) {
            if (
                $this->siswa
                ->where('noreg', $data['noreg'])
                ->where('tgl_lahir', $data['tgl_lahir'])->first() != null
            ) {
                // $ext = $file->getClientExtension();
                $newName = $file->getRandomName();
                $file->move('uploads/buktitf', $newName);
                $this->siswa->where('noreg', $data['noreg'])->set('bukti_tf', $newName)->update();
                $this->siswa->where('noreg', $data['noreg'])->set('stage', 1)->update();
                $content = array(
                    'content' => view('BuktiTfSukses'),
                    'judul' => 'Bukti Transfer Berhasil Diupload'
                );
                return view('Notif', $content);
            } else {
                echo "Data Tidak ditemukan";
            }
        } else {
            echo "gagal upload file";
        }
        // echo "is valid " . $file->isValid();
        // echo "<br> size " . $file->getSize();
        // echo "<br> ext " . $file->getClientExtension();
    }

    public function Admin(){
        $content = array(
            'content' => view('admin/login'),
            'judul' => 'Login Dashboard Admin'
        );
        return view('admin/template', $content);
    }

    public function AdminLogin(){
        helper(['form']);
        
        // Check if the request is a POST request
        if ($this->request->getMethod() == 'POST') {
            // Validate the input
            $rules = [
                'username' => 'required',
                'password' => 'required'
            ];
            
            if ($this->validate($rules)) {
                // Get the username and password from the form
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                
                // Load the user model
                // $model = new UserModel();
                
                // Check the user's credentials
                // $user = $model->where('username', $username)->first();
                
                if ($username == "admin" && $password =="adminsmpit") {
                    // Set session data
                    session()->set([
                        'username' => $username,
                        'isLoggedIn' => true
                    ]);
                    $data = array(  'session' => session()->get(),
                                    'record' => $this->siswa->findAll());
                    $content = array(
                        'content' => view('admin/dashboard', $data),
                        'judul' => ' Dashboard Admin'
                    );
                    return view('admin/template', $content);

                } else {
                    // Set an error message
                    session()->setFlashdata('error', 'Invalid login credentials.');
                }
            }
            echo "admin gagal validasi";
        }

        // $this->Admin(); 
        echo "admin gagal login";
        
    }

    public function logout()
    {
        // Destroy the session
        session()->destroy();
        return redirect()->to('/login');
    }

    function coba()
    {
        $key = 7;
        $mod = 100;

        // Enkripsi
        $original_id = 3;
        $encrypted_id = $this->encrypt_id($original_id, $key, $mod);
        echo "Original ID: $original_id -> Encrypted ID: $encrypted_id\n";

        // Dekripsi
        $decrypted_id = $this->decrypt_id($encrypted_id, $key, $mod);
        echo "<br>Encrypted ID: $encrypted_id -> Decrypted ID: $decrypted_id\n";
    }

    function getProvinsi()
    {
        return json_encode($this->provinsi->findAll());
    }

    // Enkripsi id user
    function encrypt_id($original_id, $key, $mod)
    {
        return ($original_id + $key) % $mod;
    }

    function decrypt_id($encrypted_id, $key, $mod)
    {
        return ($encrypted_id - $key + $mod) % $mod;
    }
}
