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
    ['/\/profile/', ['\Src\Controllers\UserController', 'profile']],
    ['/\/updateprofile/', ['\Src\Controllers\UserController', 'updateprofile']],
    ['/\/updateprofilepost/', ['\Src\Controllers\UserController', 'updateprofilepost']],
    ['/\/addhome/', ['\Src\Controllers\HomeController', 'addhome']],
    ['/\/addhomepost/', ['\Src\Controllers\HomeController', 'addhomepost']],
    ['/\/deletehome\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'deletehome']],
    ['/\/myhomes/', ['\Src\Controllers\HomeController', 'myhomes']],
    ['/\/rooms\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'rooms']],
    ['/\/addroom\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addRoom']],
    ['/\/addroompost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addRoomPost']],
    ['/\/pagehome\/',['\Src\Controllers\HomeController','pagehome']],
];
