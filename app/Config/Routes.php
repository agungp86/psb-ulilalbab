<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/adminsmpit', 'Home::Admin');
$routes->post('/login', 'Home::AdminLogin');
$routes->get('/registrasiBaru',     'Home::signUp');
$routes->post('/postReg',           'Home::formPost');
$routes->post('/cekRegistrasi',     'Home::checkRegistrasi');
$routes->post('/uploadBuktiTf',     'Home::BuktiTf');
$routes->get('/Prov',               'Home::getProvinsi');
