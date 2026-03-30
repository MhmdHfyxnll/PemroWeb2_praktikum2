<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 🔹 Halaman utama
$routes->get('/', 'Home::index');

// 🔹 Artikel (user)
$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');

// 🔐 Login Admin
$routes->match(['get','post'], '/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

// ⚙️ Admin CRUD
$routes->group('admin', function($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});