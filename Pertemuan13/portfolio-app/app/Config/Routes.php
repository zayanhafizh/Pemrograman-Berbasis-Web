<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], '/portfolio/create','PortfolioController::create');
$routes->get('/portfolio', 'PortfolioController::index');
$routes->match(['get', 'post'], '/portfolio/create','PortfolioController::create');