<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


//front-end
$routes->get('/', 'Home::landing');
$routes->get('/home', 'Home::index');
$routes->get('/detail-artikel/(:any)', 'Home::detart/$1');
$routes->get('/artikel/(:segment)', 'Home::artikel/$1');
$routes->get('/about', 'Home::about');

//login
$routes->get('/login', 'LoginController::index');
$routes->post('/process', 'LoginController::process');
$routes->get('/logout', 'LoginController::logout');

//back-end dashboard
$routes->get('/admin-panel', 'AdminController::index');

//artikel dashboard
$routes->get('/artikel-admin', 'ArtikelController::index');
$routes->put('/artikel-admin/edit/(:any)', 'ArtikelController::edit_artikel/$1');
$routes->put('/artikel-admin/update/(:any)', 'ArtikelController::update/$1');
$routes->delete('/artikel-admin/hapus/(:num)', 'ArtikelController::hapus_artikel/$1');
$routes->get('/tambah-data', 'ArtikelController::tambah_data');

//kegiatan dashboard
$routes->get('/kegiatan-admin', 'KegiatanController::index');
$routes->delete('/kegiatan-admin/hapus/(:num)', 'KegiatanController::hapus_kegiatan/$1');
$routes->put('/kegiatan-admin/edit/(:any)', 'KegiatanController::edit_kegiatan/$1');
$routes->put('/kegiatan-admin/update/(:any)', 'KegiatanController::update/$1');
$routes->get('/tambah-data-kegiatan', 'KegiatanController::tambah_data');

//profile dashboard
$routes->get('/profile', 'ProfileController::index');
$routes->get('/update/profile/(:num)', 'ProfileController::update_profile/$1');



























/*
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
