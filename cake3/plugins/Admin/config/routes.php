<?php
use Cake\Routing\Router;
Router::plugin('Admin', function ($routes) {
	$routes->connect('/', ['controller' => 'Admins', 'action' => 'index']);
    $routes->fallbacks('InflectedRoute');
});