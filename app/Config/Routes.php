<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==========================================
// Authentication (Login/Register/Logout) Routes
// ==========================================
$routes->get('/', 'Auth::login');                           // Shows the login page
$routes->post('/auth/process', 'Auth::process');             // Handles login form submission
$routes->get('/logout', 'Auth::logout');                     // Logs the user out

// Registration Routes
$routes->get('/register', 'Auth::register');                 // Shows the "Create Account" page
$routes->post('/auth/registerProcess', 'Auth::registerProcess'); // Handles registration submission

// ==========================================
// Dashboard Route
// ==========================================
$routes->get('/dashboard', 'Dashboard::index');              // Shows the main dashboard

// ==========================================
// User Management (CRUD) Routes
// ==========================================
$routes->get('/users', 'UserController::index');                 // Lists all users
$routes->get('/users/create', 'UserController::create');         // Shows the "Add User" form (Inside Admin)
$routes->post('/users/store', 'UserController::store');          // Saves new user from Admin panel
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');   // Shows "Edit User" form based on ID
$routes->post('/users/update/(:num)', 'UserController::update/$1'); // Updates user in DB based on ID
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');  // Deletes user from DB based on ID