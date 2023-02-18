<?php

$routes->group('defect-items',['namespace' => 'Modules\DefectManagement\Controllers'],function ($routes) {
    $routes->add('/', 'Item::index');
    $routes->add('defect-item-list-view-reload', 'Item::defectItemViewReload');
    $routes->add('tasks', 'Item::tasks');
    $routes->add('tasks/item-task-list-view-reload', 'Item::itemTaskListViewReload');
    $routes->match(['get','post'],'a', 'Item::addNewItem');
    $routes->match(['get','post'],'u/(:num)', 'Item::editNewItem/$1');
    $routes->match(['get','post'],'tasks/u/(:num)', 'Item::editTaskStatus/$1');
    $routes->add('d/(:num)', 'Item::delete/$1');
    $routes->add('history', 'Item::history');
    $routes->add('history/item-task-list-view-history-reload', 'Item::itemTaskListViewHistoryReload');
});
