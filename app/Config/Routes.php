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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('Accueil', 'AccueilController::index');
/*#########################################################################################################*/

$routes->get('/signin', 'SigninController::index');
$routes->post('signin/loginAuth', 'SigninController::loginAuth');
/*#########################################################################################################*/

$routes->get('/SignupController', 'SignupController::index'); // route signup à supprimer
$routes->post('/SignupController/store', 'SignupController::store');


/*#############################################PAGE VOIR MES RDV############################################################*/

$routes->get('/Voirrdv', 'VoirrdvController::index',['filter' => 'authGuard']);
$routes->post('/Voirrdv/Update', 'VoirrdvController::update',['filter' => 'authGuard']);
$routes->get('/Voirrdv/Delete/(:num)', 'VoirrdvController::delete/$1',['filter' => 'authGuard']);

/*###########################################PAGE AJOUTER PRATICIENS##############################################################*/

$routes->get('/Addpraticien', 'addpraticienController::index',['filter' => 'authGuard']);
$routes->post('/Addpraticien/Create', 'addpraticienController::create',['filter' => 'authGuard']);
$routes->post('/Addpraticien/Update', 'addpraticienController::update',['filter' => 'authGuard']);

/*###########################################PAGE AJOUTER REMPLACANTS##############################################################*/

$routes->get('/Addremplacant', 'addremplacantController::index',['filter' => 'authGuard']);
$routes->post('/Addremplacant/Create', 'addremplacantController::create',['filter' => 'authGuard']);
$routes->post('/Addremplacant/Update', 'addremplacantController::update',['filter' => 'authGuard']);
$routes->get('/Addremplacant/Delete/(:num)', 'addremplacantController::delete/$1',['filter' => 'authGuard']);



/*###########################################PAGE AJOUTER VISITEURS##############################################################*/

$routes->get('/Addvisiteur', 'addvisiteurController::index',['filter' => 'AuthroleFilter']);
$routes->post('/Addvisiteur/Create', 'addvisiteurController::create',['filter' => 'AuthroleFilter']);
$routes->post('/Addvisiteur/Update', 'addvisiteurController::update',['filter' => 'AuthroleFilter']);
$routes->get('/Addvisiteur/Delete/(:num)', 'addvisiteurController::delete/$1',['filter' => 'AuthroleFilter']);


/*#########################################PAGE PROFIL################################################################*/
// $routes->get('/profil', 'ProfilController::index',['filter' => 'authGuard']);

/*############################################PAGE CONSULTATION#############################################################*/
$routes->get('/Consultation', 'ConsultationController::index',['filter' => 'authGuard']);

/*##########################################PAGE COMPTE RENDU###############################################################*/
$routes->get('/CompteRendu', 'CompteRenduController::index',['filter' => 'authGuard']);
$routes->post('/CompteRendu/update', 'CompteRenduController::update', ['filter' => 'authGuard']);
/*ici le (:num) est pour l'id et le $1 est pour appeler le (:num) qui est en premiere position car possible d'en avoir plusieurs*/
$routes->get('/CompteRendu/delete/(:num)', 'CompteRenduController::delete/$1', ['filter' => 'authGuard']);
$routes->post('/CompteRendu/formulairecontact', 'CompteRenduController::formulairecontact',['filter' => 'authGuard']);

/*########################################PAGE MEDICAMENT################################################*/
$routes->get('/Medicament', 'MedicamentsController::index',['filter' => 'authGuard']);
$routes->post('/Medicament/Update', 'MedicamentsController::update',['filter' => 'authGuard']);
$routes->post('/Medicament/Create', 'MedicamentsController::create',['filter' => 'authGuard']);
$routes->get('/Medicament/Delete/(:num)', 'MedicamentsController::delete/$1',['filter' => 'authGuard']);


/*###############################################PAGE LOGOUT##########################################################*/
$routes->get('/logout', 'LogoutController::index',['filter' => 'authGuard']);

/*###############################################API Compte Login#####################################################*/
$routes->post('/api/SignIn', 'SigninController::signInApi');
/*###############################################API CompteRendu#####################################################*/
$routes->get('/api/CompteRendu', 'CompteRenduController::indexApi', ['filter' => 'apiAuthGuard']);
$routes->post('/api/CompteRenduPost', 'CompteRenduController::postCompteRenduApi', ['filter' => 'apiAuthGuard']);
/*###############################################API Consultation#####################################################*/
$routes->get('/api/Consultation', 'ConsultationController::indexApi', ['filter' => 'apiAuthGuard']);
/*###############################################API Voir RDV#####################################################*/
$routes->get('/api/VoirRdv', 'VoirrdvController::indexApi', ['filter' => 'apiAuthGuard']);
// $routes->get('/api/VoirRdv', 'VoirrdvController::getWeekApi', ['filter' => 'apiAuthGuard']);


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
