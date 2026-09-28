<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'TaskController::index');
$routes->get('/tasks', 'TaskController::tasks');
$routes->get('/profile', 'TaskController::profile');
$routes->get('/about', 'TaskController::about');