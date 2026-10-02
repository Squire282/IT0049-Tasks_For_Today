<?php

use CodeIgniter\Router\RouteCollection;


// ----------------------------------------------------
// PUBLIC PAGES
// ----------------------------------------------------

$routes->get('/', 'TaskController::index');

$routes->get('/tasks', 'TaskController::tasks');

$routes->get('/profile', 'TaskController::profile');

$routes->get('/about', 'TaskController::about');


// ----------------------------------------------------
// AUTHENTICATION
// ----------------------------------------------------

$routes->get('/login', 'Auth::login');

$routes->post('/login', 'Auth::attemptLogin');

$routes->get('/logout', 'Auth::logout');


// ----------------------------------------------------
// PROTECTED TASK MANAGEMENT
// ----------------------------------------------------

// New Task
$routes->get(
    '/tasks/new',
    'TaskController::new',
    ['filter' => 'auth']
);


// Create Task
$routes->post(
    '/tasks/create',
    'TaskController::create',
    ['filter' => 'auth']
);


// Edit Task
$routes->get(
    '/tasks/edit/(:num)',
    'TaskController::edit/$1',
    ['filter' => 'auth']
);


// Update Task
$routes->post(
    '/tasks/update/(:num)',
    'TaskController::update/$1',
    ['filter' => 'auth']
);


// Archive Task
$routes->post(
    '/tasks/archive/(:num)',
    'TaskController::archive/$1',
    ['filter' => 'auth']
);