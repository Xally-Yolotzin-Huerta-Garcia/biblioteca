<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');

$routes->get('/libros', 'Libros::listar');
$routes->post('/save', 'Libros::save');
$routes->get('/create', 'Libros::create');
$routes->get('/delete/(:num)', 'Libros::delete/$1');
$routes->get('/edit/(:num)', 'Libros::edit/$1');
$routes->post('/update', 'Libros::update');

$routes->post('/', 'Users::index');
$routes->get('/forgot-password', 'Home::forgotPassword');