<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/logout', 'Users::logout');




$routes->post('/login', 'Users::login');
$routes->get('/forgotPassword', 'Users::forgotPassword');
$routes->post('/resetPassword', 'Users::resetPassword');


//codigo para proteger todas las rutas necesarias

$routes->group('', ['filter' => 'auth'], function ($routes) {
    // Rutas que deben estar autenticadas
    $routes->get('/libros', 'Libros::listar');
$routes->post('/save', 'Libros::save');
$routes->get('/create', 'Libros::create');
$routes->get('/delete/(:num)', 'Libros::delete/$1');
$routes->get('/edit/(:num)', 'Libros::edit/$1');
$routes->post('/update', 'Libros::update');
$routes->get('/search', 'Libros::search'); 

});
