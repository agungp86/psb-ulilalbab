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



// route siswa 
$routes->get('/registrasiBaru',     'Home::signUp');
$routes->post('/postReg',           'Home::formPost');
$routes->post('/cekRegistrasi',     'Home::checkRegistrasi');
$routes->post('/uploadBuktiTf',     'Home::BuktiTf');
$routes->get('/Prov',               'Home::getProvinsi');
