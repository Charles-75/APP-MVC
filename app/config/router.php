<?php

/** @var Array[] $routes */
$routes = [
    ['/\//', ['\Src\Controllers\IndexController', 'index']],
    ['/\/about/', ['\Src\Controllers\AboutController', 'about']],
    ['/\/contact/', ['\Src\Controllers\IndexController', 'contact']],
    ['/\/member\/(?<id>[0-9]+)/', ['\Src\Controllers\IndexController', 'member']],
    ['/\/login/', ['\Src\Controllers\UserController', 'login']],
    ['/\/register/', ['\Src\Controllers\UserController', 'register']],
    ['/\/registerpost/', ['\Src\Controllers\UserController', 'registerpost']],
    ['/\/loginpost/', ['\Src\Controllers\UserController', 'loginpost']],
    ['/\/addhome/', ['\Src\Controllers\HomeController', 'addhome']],
    ['/\/addhomepost/', ['\Src\Controllers\HomeController', 'addhomepost']],
    ['/\/myhomes/', ['\Src\Controllers\HomeController', 'myhomes']],
    ['/\/addhomepost/', ['\Src\Controllers\HomeController', 'addhomepost']],
    ['/\/apartment\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'apartment']]
];
