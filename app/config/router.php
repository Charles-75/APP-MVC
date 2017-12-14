<?php

/** @var Array[] $routes */
$routes = [
    ['/\//', ['\Src\Controllers\IndexController', 'index']],
    ['/\/about/', ['\Src\Controllers\AboutController', 'about']],
    ['/\/contact/', ['\Src\Controllers\IndexController', 'contact']],
    ['/\/member\/(?<id>[0-9]+)/', ['\Src\Controllers\IndexController', 'member']],
    ['/\/login/', ['\Src\Controllers\UserController', 'login']],
    ['/\/logout/', ['\Src\Controllers\UserController', 'logout']],
    ['/\/register/', ['\Src\Controllers\UserController', 'register']],
    ['/\/registerpost/', ['\Src\Controllers\UserController', 'registerpost']],
    ['/\/loginpost/', ['\Src\Controllers\UserController', 'loginpost']],
    ['/\/addhome/', ['\Src\Controllers\HomeController', 'addhome']],
    ['/\/addhomepost/', ['\Src\Controllers\HomeController', 'addhomepost']],
    ['/\/deletehome\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'deletehome']],
    ['/\/myhomes/', ['\Src\Controllers\HomeController', 'myhomes']],
    ['/\/home\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'home']],
    ['/\/rooms/', ['\Src\Controllers\HomeController', 'rooms']],
];
