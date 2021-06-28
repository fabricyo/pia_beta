<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//Podas
$routes->get('podas', 'PodasController::index');
$routes->get('podas/create', 'PodasController::create');
$routes->post('podas/store', 'PodasController::store');
$routes->get('podas/details/(:num)', 'PodasController::details/$1');
$routes->get('podas/edit/(:num)', 'PodasController::edit/$1');
$routes->post('podas/update/(:num)', 'PodasController::update/$1');
$routes->get('podas/delete/(:num)', 'PodasController::delete/$1');

//Supressões
$routes->get('supressoes', 'SupressoesController::index');
$routes->get('supressoes/create', 'SupressoesController::create');
$routes->post('supressoes/store', 'SupressoesController::store');
$routes->get('supressoes/details/(:num)', 'SupressoesController::details/$1');
$routes->get('supressoes/edit/(:num)', 'SupressoesController::edit/$1');
$routes->post('supressoes/update/(:num)', 'SupressoesController::update/$1');
$routes->get('supressoes/delete/(:num)', 'SupressoesController::delete/$1');

//OSs
$routes->get('oss', 'OSsController::index');
$routes->get('oss/create', 'OSsController::create');
$routes->post('oss/store', 'OSsController::store');
$routes->get('oss/details/(:num)', 'OSsController::details/$1');
$routes->get('oss/edit/(:num)', 'OSsController::edit/$1');
$routes->post('oss/update/(:num)', 'OSsController::update/$1');
$routes->get('oss/delete/(:num)', 'OSsController::delete/$1');
$routes->get('oss/gerar-excel/(:any)', 'OSsController::gerar_excel/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
