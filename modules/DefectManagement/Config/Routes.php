<?php

$routes->group('defect-items',['namespace' => 'Modules\DefectManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Item::index');
    $routes->add('tasks', 'Item::tasks');
});
