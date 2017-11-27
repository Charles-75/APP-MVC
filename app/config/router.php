<?php

/** @var Array[] $routes */
$routes = [
    ['/\//', ['\Src\Controllers\IndexController', 'index']],
    ['/\/about/', ['\Src\Controllers\AboutController', 'about']],
    ['/\/contact/', ['\Src\Controllers\IndexController', 'contact']],
    ['/\/member\/(?<id>[0-9]+)/', ['\Src\Controllers\IndexController', 'member']]
];
