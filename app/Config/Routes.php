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
$routes->setAutoRoute(false);

if(!defined('ADMIN_NAMESPACE'))define ('ADMIN_NAMESPACE', 'App\Controllers\Administration');
if(!defined('PUBLIC_NAMESPACE'))define ('PUBLIC_NAMESPACE', 'App\Controllers\PublicSection');
if(!defined('COMMAND_NAMESPACE'))define ('COMMAND_NAMESPACE', 'App\Controllers\Command');
if(!defined('REST_NAMESPACE'))define ('REST_NAMESPACE', 'App\Controllers\Rest');


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
/*$routes->get('/', 'Home::index');
$routes->get('/login', 'LoginController::login', ['as' => 'login_page','namespace' => PUBLIC_NAMESPACE]);
$routes->get('/admin/home', 'HomeAdminController::homeAdmin' , ['as' => 'homeAdmin_page','namespace' => ADMIN_NAMESPACE ]);
$routes->get('/home/', 'HomeController::home', ['as' => 'home_page' ,'namespace' => PUBLIC_NAMESPACE]);
*/
//Asi se hace para agrupar las publicas
$routes->group('', function ($routes){
    $routes->get('/', 'LoginController::login', ['as' => 'login_page','filter' => 'login_auth' ,'namespace' => PUBLIC_NAMESPACE]);
    $routes->get('/home', 'HomeController::home', ['as' => 'home_page', 'filter' => 'auth_public' ,'namespace' => PUBLIC_NAMESPACE]);
    $routes->get('/pruebaAjax', 'LoginController::pruebaAjax', ['as' => 'prueba_ajax','namespace' => PUBLIC_NAMESPACE]);
    $routes->post('/formulario', 'LoginController::formulario', ['as' => 'formulario','namespace' => PUBLIC_NAMESPACE]);


});
$routes->group('admin', function ($routes){
    $routes->get('', 'HomeController::home' , ['as' => 'admin_page', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    $routes->get('festivals', 'FestivalController::home' , ['as' => 'festivals_page', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    //Llamada post para guardar los datos
    $routes->post('festivals', 'FestivalController::saveFestival' , ['as' => 'festivals_save' ,'namespace' => ADMIN_NAMESPACE ]);
    //
    //----Vistas para el formulario de crear/editar
    $routes->get('festivals/view/edit', 'FestivalController::viewEditFestival' , ['as' => 'festivals_view_edit', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    $routes->get('festivals/view/edit/(:any)', 'FestivalController::viewEditFestival/$1' , ['filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    //
    $routes->get('categories', 'CategoriesController::home' , ['as' => 'categories_page', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    //Llamada post para guardar los datos
    $routes->post('categories', 'CategoriesController::saveCategories' , ['as' => 'categories_save' ,'namespace' => ADMIN_NAMESPACE ]);
    //
    //----Vistas para el formulario de crear/editar
    $routes->get('categories/view/edit', 'CategoriesController::viewEditCategories' , ['as' => 'categories_view_edit', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    $routes->get('categories/view/edit/(:any)', 'CategoriesController::viewEditCategories/$1' , ['filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    //
    $routes->get('users', 'UsersController::home' , ['as' => 'users_page', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    $routes->post('users', 'UsersController::saveUsers' , ['as' => 'users_save' ,'namespace' => ADMIN_NAMESPACE ]);
    //
    //----Vistas para el formulario de crear/editar
    $routes->get('users/view/edit', 'UsersController::viewEditUsers' , ['as' => 'users_view_edit', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    $routes->get('users/view/edit/(:any)', 'UsersController::viewEditUsers/$1' , ['filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    //
    $routes->get('roles', 'RolesController::home' , ['as' => 'roles_page', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    $routes->post('roles', 'RolesController::saveRoles' , ['as' => 'roles_save' ,'namespace' => ADMIN_NAMESPACE ]);
    //
    //----Vistas para el formulario de crear/editar
    $routes->get('roles/view/edit', 'RolesController::viewEditRoles' , ['as' => 'roles_view_edit', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    $routes->get('roles/view/edit/(:any)', 'RolesController::viewEditRoles/$1' , ['filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
    //
    $routes->get('settings', 'SettingsController::home' , ['as' => 'settings_page', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
});

//----------- DataTable routes ------------------
$routes->post('festivals_data', 'FestivalController::getFestivalsData' , ['as' => 'festivals_data', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
$routes->post('roles_data', 'RolesController::getRolesData', ['as' => 'roles_data', 'filter' => 'auth_private', 'namespace' => ADMIN_NAMESPACE]);
$routes->post('categories_data', 'CategoriesController::getCategoriesData', ['as' => 'categories_data', 'filter' => 'auth_private', 'namespace' => ADMIN_NAMESPACE]);
$routes->post('users_data', 'UsersController::getUsersData', ['as' => 'users_data', 'filter' => 'auth_private', 'namespace' => ADMIN_NAMESPACE]);
//-----------------------------------------------

//----------- DataTable routes delete------------------
$routes->delete('festivals_delete', 'FestivalController::deleteFestival' , ['as' => 'festivals_delete', 'filter' => 'auth_private' ,'namespace' => ADMIN_NAMESPACE ]);
$routes->delete('roles_delete', 'RolesController::deleteRoles', ['as' => 'roles_delete', 'filter' => 'auth_private', 'namespace' => ADMIN_NAMESPACE]);
$routes->delete('categories_delete', 'CategoriesController::deleteCategories', ['as' => 'categories_delete', 'filter' => 'auth_private', 'namespace' => ADMIN_NAMESPACE]);
$routes->delete('users_delete', 'UsersController::deleteUsers', ['as' => 'users_delete', 'filter' => 'auth_private', 'namespace' => ADMIN_NAMESPACE]);
//-----------------------------------------------

$routes->group('commands', function ($routes){
    $routes->cli('comando_uno', 'Prueba::comandoUno' , ['namespace' => COMMAND_NAMESPACE ]);
    $routes->cli('comando_dos', 'Prueba::comandoDos' , ['namespace' => COMMAND_NAMESPACE ]);
    $routes->cli('pokemon', 'Prueba::pokemon' , ['namespace' => COMMAND_NAMESPACE ]);
    $routes->cli('villena', 'Prueba::villena' , ['namespace' => COMMAND_NAMESPACE ]);
});
// $routes->group('rest', function ($routes){
//     $routes->get('prueba_rest', 'PruebaRestController::pruebaRest' , ['namespace' => REST_NAMESPACE ]);
//     $routes->post('prueba_rest', 'PruebaRestController::pruebaRest' , ['namespace' => REST_NAMESPACE ]);
//     $routes->delete('prueba_rest', 'PruebaRestController::pruebaRest' , ['namespace' => REST_NAMESPACE ]);
//     $routes->put('prueba_rest', 'PruebaRestController::pruebaRest' , ['namespace' => REST_NAMESPACE ]);
// });
$routes->group('rest', function ($routes){
    $routes->get('categories', 'CategoriesController::categoriesRest' , ['namespace' => REST_NAMESPACE ]);
    $routes->get('categories/(:any)', 'CategoriesController::categoriesRest/$1' , ['namespace' => REST_NAMESPACE ]);
    $routes->delete('categories', 'CategoriesController::categoriesDeleteRest' , ['namespace' => REST_NAMESPACE ]);
    $routes->post('categories', 'CategoriesController::categoriesUpdateRest' , ['namespace' => REST_NAMESPACE ]);    
});



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
