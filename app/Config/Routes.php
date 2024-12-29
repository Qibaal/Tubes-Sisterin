<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth
$routes->get('/signup', 'AuthController::showSignUpForm');
$routes->post('/signup', 'AuthController::signup');
$routes->get('/login', 'AuthController::showLoginForm');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->group('profile', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'ProfileController::index');
    $routes->post('update', 'ProfileController::update');
});

$routes->group('adoption', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'AdoptionController::index');
    $routes->get('info/(:num)', 'AdoptionController::showInfo/$1');
    $routes->match(['get', 'post'], 'request/(:num)', 'AdoptionController::requestAdoption/$1'); 
});

$routes->group('admin', ['filter' => 'admin'], function ($routes) {
    $routes->get('animals', 'AdminController::index');
    $routes->get('animals/create', 'AdminController::create');
    $routes->post('animals/store', 'AdminController::store');
    $routes->get('animals/edit/(:num)', 'AdminController::edit/$1');
    $routes->post('animals/update/(:num)', 'AdminController::update/$1');
    $routes->get('animals/delete/(:num)', 'AdminController::delete/$1');
    $routes->get('requests', 'AdminController::listRequests');
    $routes->post('requests/update/(:num)/(:alpha)', 'AdminController::updateRequestStatus/$1/$2');
});


