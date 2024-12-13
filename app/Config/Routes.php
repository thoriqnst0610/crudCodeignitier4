<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/test/', 'Test::test');
$routes->get('/belajarHelper/', 'Test::belajarHelper');
$routes->get('/belajarLibrary/', 'Test::belajarLibrary');
$routes->get('/belajarMiddleware/', 'Test::belajarMiddleware',['filter' => 'auth']);
$routes->get('/login/', 'Test::login');
$routes->post('/upload/', 'Test::upload');
$routes->get('/uploadfile/', 'Test::uploadfile');


// Router untuk Crud
$routes->get('/menampilkanData', 'Crud::menampilkanData');
$routes->post('/menambahData', 'Crud::menambahData');
$routes->post('/mengeditData', 'Crud::mengeditData');
$routes->get('/menghapusData/delete/(:num)', 'Crud::menghapusData/$1');

$routes->get('uploads/(:segment)', 'Crud::mengambilGambar/$1');
