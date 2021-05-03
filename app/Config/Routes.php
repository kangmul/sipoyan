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
$routes->setDefaultController('Home');
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
$routes->get('/home', 'Home::index');
$routes->get('/defaults', 'Home::defaultBlank');
$routes->get('/users', 'Admin\Users::index');

$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/master/datawarga', 'Master\Masterdatawarga::index');
$routes->get('/master/databalita', 'Master\Masterdatawarga::databalita');
$routes->get('/master/datalansia', 'Master\Masterdatawarga::datalansia');
$routes->get('/master/tambahdata', 'Master\Masterdatawarga::createdatawarga');

// ambil data reference
$routes->get('/refagama', 'Master\Referencedata::Ajaxagama');

// post data to datatable ajax
$routes->post('getdatawarga', 'Master\Masterdatawarga::Tabeldatawarga');
$routes->post('getdatabalita', 'Master\Masterdatawarga::Tabeldatabalita');
$routes->post('getdatalansia', 'Master\Masterdatawarga::Tabeldatalansia');

// menyimpan datawarga
$routes->post('/master/tambahdatawarga', 'Master\Masterdatawarga::savedatawarga');
// 

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
