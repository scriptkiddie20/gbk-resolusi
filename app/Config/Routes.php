<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Landing');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Landing::index');
$routes->add('/orderpaket', 'Landing::orderpaket');
$routes->get('/cs/(:segment)', 'Landing::cs');

$routes->get('/admin', 'Admin\Dashboard::index');

$routes->get('/products', 'Users\Products::index');

$routes->get('/user', 'Users\Dashboard::index');
$routes->get('/packages', 'Users\Packages::index');
$routes->get('/packages/(:num)', 'Users\Packages::detail/$1');
$routes->delete('/packages/delete/(:num)', 'Users\Packages::delete/$1');

$routes->add('/leads/update', 'Users\Leads::update');
$routes->add('/leads/edit/(:num)', 'Users\Leads::edit/$1');
$routes->add('/leads/add', 'Users\Leads::add');
$routes->add('/leads/delete/(:num)', 'Users\Leads::delete/$1');
$routes->add('/leads/listdata', 'Users\Leads::listdata');
$routes->get('/leads', 'Users\Leads::index');


$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
