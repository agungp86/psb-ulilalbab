<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // route admin
$routes->get('/', 'Home::index');
$routes->get('/adminsmpit', 'Home::Admin');
$routes->post('/login', 'Home::AdminLogin');
$routes->get('/detail_siswa/(:num)', 'Home::Detail/$1', ['filter' => 'sessionCheck']);
$routes->post('/verifikasiTf', 'Home::verifikasiBuktiTranfer', ['filter' => 'sessionCheck']);
$routes->get('/dashboard', 'Home::dashboard', ['filter' => 'sessionCheck']);
$routes->get('/form', 'Home::formControl', ['filter' => 'sessionCheck']);
$routes->get('/logout', 'Home::logout');
$routes->get('/statustahun/(:num)/(:num)', 'Home::updateStatus/tahun/$1/$2');
$routes->get('/statusjalur/(:num)/(:num)', 'Home::updateStatus/jalur/$1/$2');
$routes->post('/updatetahun', 'Home::formupdate/tahun');
$routes->post('/updatejalur', 'Home::formupdate/jalur');
$routes->post('/hapusPdftr', 'Home::hapusPendaftaranSiswa', ['filter' => 'sessionCheck']);
$routes->post('/postEdit', 'Home::editPendaftaranSiswa', ['filter' => 'sessionCheck']);
$routes->post('/verifikasiWawancara', 'Home::stageWawancara', ['filter' => 'sessionCheck']);
$routes->get('/api/berkas/(:num)', 'Uploads::getBerkasJson/$1');


//Download data
$routes->get('/downloadExcel', 'Excel::downloadExcel');
$routes->post('download/bulk', 'Download::bulk');
$routes->post('siswa/deleteBulk', 'Siswa::deleteBulk');


// route siswa 
$routes->get('/registrasiBaru',     'Home::signUp');
$routes->post('/postReg',           'Home::formPost');
$routes->get('/cekRegistrasi',     'Home::checkRegistrasi');
$routes->post('/uploadBuktiTf',     'Home::BuktiTf');
$routes->get('/Prov',               'Home::getProvinsi');
$routes->get('/jalur',               'Home::getJalur');
$routes->get('/tahun',               'Home::getTahun');
$routes->post('/berkas/upload/foto',       'Uploads::uploadFoto');
$routes->post('/berkas/upload/akta',       'Uploads::uploadAkta');
$routes->post('/berkas/upload/kk',         'Uploads::uploadKk');
$routes->post('/berkas/upload/surat',      'Uploads::uploadSurat');
$routes->post( '/uploadBerkas/next', 'Uploads::setStage5');
