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




// route siswa 
$routes->get('/registrasiBaru',     'Home::signUp');
$routes->post('/postReg',           'Home::formPost');
$routes->post('/cekRegistrasi',     'Home::checkRegistrasi');
$routes->post('/uploadBuktiTf',     'Home::BuktiTf');
$routes->get('/Prov',               'Home::getProvinsi');
$routes->get('/jalur',               'Home::getJalur');
$routes->get('/tahun',               'Home::getTahun');
