<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::index');
$routes->get('/libros', 'Libros::listar');
$routes->get('/save', 'Libros::save');
$routes->post('/', 'Users::index');
$routes->get('/forgot-password', 'Home::forgotPassword');