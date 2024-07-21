<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/registrasiBaru',     'Home::signUp');

$routes->post('/postReg',           'Home::formPost');
$routes->post('/cekRegistrasi',     'Home::checkRegistrasi');
$routes->get('/Prov',               'Home::getProvinsi');
