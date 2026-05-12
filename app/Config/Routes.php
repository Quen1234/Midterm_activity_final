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
$routes->get('/pos', 'Pos::index');                          // Shows the POS page
$routes->post('/pos/checkout', 'Pos::checkout');           // Processes POS checkout
$routes->get('/categories', 'Categories::index');            // Lists all categories
$routes->post('/categories/store', 'Categories::store');        // Stores new category
$routes->post('/categories/update/(:num)', 'Categories::update/$1'); // Updates category
$routes->post('/categories/delete/(:num)', 'Categories::delete/$1'); // Deletes category

$routes->get('/stock', 'Stock::index');                      // Placeholder
$routes->post('/stock/update', 'Stock::update');            // Updates stock quantity
$routes->get('/reports', 'Reports::index');                  // Placeholder
$routes->get('/audit', 'Audit::index');                      // Placeholder

// ==========================================
// User Management (CRUD) Routes
// ==========================================
$routes->get('/users', 'UserController::index');                 // Lists all users
$routes->get('/users/create', 'UserController::create');         // Shows the "Add User" form (Inside Admin)
$routes->post('/users/store', 'UserController::store');          // Saves new user from Admin panel
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');   // Shows "Edit User" form based on ID
$routes->post('/users/update/(:num)', 'UserController::update/$1'); // Updates user in DB based on ID
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');  // Deletes user from DB based on ID
$routes->get('listahan', 'Listahan::index');
$routes->post('listahan/store', 'Listahan::store');
$routes->get('listahan/settle/(:num)', 'Listahan::settle/$1');
$routes->get('listahan/delete/(:num)', 'Listahan::delete/$1');
$routes->get('inventory', 'Inventory::index');
$routes->get('inventory/add', 'Inventory::add');
$routes->get('inventory/edit/(:num)', 'Inventory::edit/$1'); // Added edit route
$routes->post('inventory/store', 'Inventory::store');
$routes->post('inventory/update/(:num)', 'Inventory::update/$1'); // Added update route
$routes->get('inventory/delete/(:num)', 'Inventory::delete/$1');