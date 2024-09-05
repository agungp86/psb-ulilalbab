<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // route admin
$routes->get('/', 'Home::index');
$routes->get('/adminsmpit', 'Home::Admin');
$routes->post('/login', 'Home::AdminLogin');
$routes->get('/detail_siswa/(:num)', 'Home::Detail/$1');
$routes->post('/verifikasiTf', 'Home::verifikasiBuktiTranfer');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/form', 'Home::formControl');
$routes->get('/logout', 'Home::logout');
$routes->get('/statustahun/(:num)/(:num)', 'Home::updateStatus/tahun/$1/$2');
$routes->get('/statusjalur/(:num)/(:num)', 'Home::updateStatus/jalur/$1/$2');
$routes->post('/updatetahun', 'Home::formupdate/tahun');
$routes->post('/updatejalur', 'Home::formupdate/jalur');
$routes->post('/hapusPdftr', 'Home::hapusPendaftaranSiswa');
$routes->post('/postEdit', 'Home::editPendaftaranSiswa');




// route siswa 
$routes->get('/registrasiBaru',     'Home::signUp');
$routes->post('/postReg',           'Home::formPost');
$routes->post('/cekRegistrasi',     'Home::checkRegistrasi');
$routes->post('/uploadBuktiTf',     'Home::BuktiTf');
$routes->get('/Prov',               'Home::getProvinsi');
$routes->get('/jalur',               'Home::getJalur');
$routes->get('/tahun',               'Home::getTahun');
