<?php

$routes->group('dashboard',['namespace' => 'Modules\DashboardManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Dashboard::index');
});
