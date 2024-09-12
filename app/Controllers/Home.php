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
        $data = array(
            'tahunajar' => $this->getTahun(),
            'jalur'     => $this->getJalur()
        );
        return view('Form', $data);
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
            'tahunajar' => $data['thn_ajar'],
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
            $content = array(
                'content' => '<div class="alert alert-danger text-center m-2" role="alert">
                                Data Pendaftaran Tidak Ditemukan
                                </div>',
                'judul' => ' Dashboard Admin'
            );
            return view('admin/template', $content);
        } else {
            switch ($data['stage']) {
                case 0:
                    return view('UploadBuktiTf', $data);
                case 1:
                    return view('Notif', [
                        'content' => view('BuktiTfSukses'),
                        'judul' => 'Bukti Transfer Berhasil Diupload'
                    ]);
                case 2:
                    return view('Notif', [
                        'content' => view('Verified'),
                        'judul' => 'Pendaftaran dan pembayaran diverifikasi'
                    ]);
                case 3:
                    $this->coba();
                    break;
                default:
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

    public function Admin()
    {
        $content = array(
            'content' => view('admin/login'),
            'judul' => 'Login Dashboard Admin'
        );
        return view('admin/template', $content);
    }

    public function AdminLogin()
    {
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

                if ($username == "admin" && $password == "adminsmpit") {
                    // Set session data
                    session()->set([
                        'username' => $username,
                        'isLoggedIn' => true
                    ]);

                    return $this->dashboard();
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

    function dashboard()
    {
        $data = array(
            // 'session' => session()->get(),
            'record' => $this->siswa->findAll()
        );

        foreach ($data['record'] as &$key) {
            $key['created_at'] = $this->ubahJam($key['created_at']);
        }

        $content = array(
            'content' => view('admin/dashboard', $data),
            'judul' => ' Dashboard Admin'
        );
        return view('admin/template', $content);
    }

    public function editPendaftaranSiswa(){
        $data = $this->request->getPost();
        $siswa = array();
        
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                switch ($key) {
                    case 'nama':
                        $siswa['nama'] = $value;
                        break;
        
                    case 'jk':
                        $siswa['jk'] = $value;
                        break;
        
                    case 'jalur':
                        $siswa['jalur'] = $value;
                        break;
        
                    case 'tempat_lahir':
                        $siswa['tempat_lahir'] = $value;
                        break;
        
                    case 'tanggal_lahir':
                        $siswa['tgl_lahir'] = $value;
                        break;
        
                    case 'nama_orang_tua':
                        $siswa['ortu'] = $value;
                        break;
        
                    case 'telepon_orang_tua':
                        $siswa['telp_ortu'] = $value;
                        break;
        
                    case 'provinsi_siswa':
                        $siswa['prov1'] = $value;
                        break;
        
                    case 'kabupaten_siswa':
                        $siswa['kabko1'] = $value;
                        break;
        
                    case 'thn_ajar':
                        $siswa['tahunajar'] = $value;
                        break;
        
                    case 'kecamatan_siswa':
                        $siswa['kec1'] = $value;
                        break;
        
                    case 'kelurahan_siswa':
                        $siswa['kelurahan1'] = $value;
                        break;
        
                    case 'alamat':
                        $siswa['detail_alamat'] = $value;
                        break;
        
                    case 'nama_sekolah':
                        $siswa['nama_sekolah'] = $value;
                        break;
        
                    case 'provinsi_sekolah':
                        $siswa['prov2'] = $value;
                        break;
        
                    case 'kabupaten_sekolah':
                        $siswa['kabko2'] = $value;
                        break;
        
                    case 'kecamatan_sekolah':
                        $siswa['kec2'] = $value;
                        break;
        
                    case 'kelurahan_sekolah':
                        $siswa['kelurahan2'] = $value;
                        break;
        
                    default:
                        // Handle any other key if necessary
                        break;
                }
            }
        }

        $this->siswa->where('id', $data['id'])->set($siswa)->update();
        return redirect()->to(previous_url());
        
        // Now, the $siswa array contains only the non-empty fields

    }

    public function hapusPendaftaranSiswa()
    {
        $id = $this->request->getPost('id');
        $this->siswa->delete($id);

        return redirect()->to(previous_url());
    }

    public function formControl()
    {
        $data = array(
            'tahun' => $this->getAllForm('tahunajar'),
            'jalur' => $this->getAllForm('jalur')
        );
        $content = array(
            'content' => view('admin/form', $data),
            'judul' => ' Dashboard Admin'
        );
        return view('admin/template', $content);
    }

    public function formupdate($table = null)
    {
        $nama = $this->request->getPost('nama');
        $id = $this->request->getPost('id');
        if ($table == "jalur") {
            $this->getJalur($id, $nama);
            return redirect()->to(previous_url());
        } elseif ($table == "tahun") {
            $this->getTahun($id, $nama);
            return redirect()->to(previous_url());
        }
    }

    //detail siswa per id
    public function Detail($id)
    {
        $siswa_0 = $this->siswa->where('id', $id)->first();

        if ($siswa_0) {
            $siswa_1 = array(
                'prov1' => $this->getRegionName('t_provinsi', $siswa_0['prov1']),
                'kabko1' => $this->getRegionName('t_kota', $siswa_0['kabko1']),
                'kec1' => $this->getRegionName('t_kecamatan', $siswa_0['kec1']),
                'kelurahan1' => $this->getRegionName('t_kelurahan', $siswa_0['kelurahan1']),
                'prov2' => $this->getRegionName('t_provinsi', $siswa_0['prov2']),
                'kabko2' => $this->getRegionName('t_kota', $siswa_0['kabko2']),
                'kec2' => $this->getRegionName('t_kecamatan', $siswa_0['kec2']),
                'kelurahan2' => $this->getRegionName('t_kelurahan', $siswa_0['kelurahan2']),
            );
            $siswa = array_replace($siswa_0, $siswa_1);
            // d($siswa);

            $data = array(
                'siswa' => $siswa,
                'form' => $this->formEdit($siswa)
        );

            $content = array(
                'content' => view('admin/detail_siswa', $data),
                'judul' => ' Dashboard Admin'
            );
            return view('admin/template', $content);
        } else {
            $content = array(
                'content' => '<div class="alert alert-danger text-center m-2" role="alert">
                                Data Tidak Ditemukan
                                </div>',
                'judul' => ' Dashboard Admin'
            );
            return view('admin/template', $content);
        }
    }

    function formEdit($value)
    {
        $data = array(
            'tahunajar' => $this->getTahun(),
            'jalur'     => $this->getJalur(),
            'value'     => $value
        );
        return view('admin/formEdit', $data);
    }

    public function verifikasiBuktiTranfer()
    {
        $id = $this->request->getPost('id');

        $this->siswa->where('id', $id)->set('stage', 2)->update();
        return redirect()->to(previous_url());
    }

    public function logout()
    {
        // Destroy the session
        session()->destroy();
        return redirect()->to('/adminsmpit');
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

    public function updateStatus($table, $id, $value)
    {
        $db = \Config\Database::connect();
        if ($table == 'tahun') {
            $query = $db->table('tahunajar')
                ->where('id', $id)
                ->set('enable', $value)
                ->update();

            return redirect()->to(previous_url());
        } elseif ($table == 'jalur') {
            $query = $db->table('jalur')
                ->where('id', $id)
                ->set('enable', $value)
                ->update();

            return redirect()->to(previous_url());
        } else {
            return redirect()->to(previous_url());
        }
    }

    function getJalur($id = null, $nama = null)
    {
        $db = \Config\Database::connect();
        if ($id == null) {
            $query = $db->table('jalur')
                ->select('nama')
                ->select('id')
                ->where('enable', 1)
                ->get();

            $result = $query->getResultArray();
            return $result;
        } elseif ($id <> null && $nama <> null) {
            $query = $db->table('jalur')
                ->where('id', $id)
                ->set('nama', $nama)
                ->update();
        }
    }

    function getTahun($id = null, $nama = null)
    {
        $db = \Config\Database::connect();
        if ($id == null) {
            $query = $db->table('tahunajar')
                ->select('nama')
                ->select('id')
                ->where('enable', 1)
                ->get();

            $result = $query->getResultArray();
            return $result;
        } elseif ($id <> null && $nama <> null) {
            $query = $db->table('tahunajar')
                ->where('id', $id)
                ->set('nama', $nama)
                ->update();
        }
    }

    //Ubah jam
    public function ubahJam($gmtTime)
    {
        //$gmtTime = '2024-08-19 13:26:21'; // The original GMT timestamp

        // Create a DateTime object from the GMT timestamp
        $dateTime = new DateTime($gmtTime, new \DateTimeZone('GMT'));

        // Set the timezone to GMT+7
        $dateTime->setTimezone(new \DateTimeZone('Asia/Bangkok'));

        // Format the date to your desired format
        $localTime = $dateTime->format('Y-m-d H:i:s');

        return $localTime; // This will output the time in GMT+7
    }
    function getAllForm($table = null)
    {
        if ($table == 'jalur' || $table == 'tahunajar') {
            $db = \Config\Database::connect();
            $query = $db->table($table)
                ->select('*')
                ->get();

            $result = $query->getResultArray();
            return $result;
        }
    }

    function prov($id)
    {
        $db = \Config\Database::connect();
        $query = $db->table('t_provinsi')
            ->select('nama')
            ->where('id', $id)
            ->get();

        $result = $query->getRow();

        if ($result) {
            echo $result->nama;
        } else {
            echo 'No region found with this id.';
        }
    }

    function getRegionName($table, $id)
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
