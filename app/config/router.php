<?php

/** @var Array[] $routes */
$routes = [
    ['/\//', ['\Src\Controllers\IndexController', 'index']],

    ['/\/about/', ['\Src\Controllers\AboutController', 'about']],

    ['/\/contact/', ['\Src\Controllers\IndexController', 'contact']],

    ['/\/member\/(?<id>[0-9]+)/', ['\Src\Controllers\IndexController', 'member']],

    ['/\/login/', ['\Src\Controllers\UserController', 'login']],

    ['/\/login_admin/', ['\Src\Controllers\AdminController', 'login']], //admin

    ['/\/logout/', ['\Src\Controllers\UserController', 'logout']],

    ['/\/register/', ['\Src\Controllers\UserController', 'register']],

    ['/\/registerpost/', ['\Src\Controllers\UserController', 'registerpost']],

    ['/\/loginpost/', ['\Src\Controllers\UserController', 'loginpost']],

    ['/\/login_adminpost/', ['\Src\Controllers\AdminController', 'loginpost']], //admin

    ['/\/profile/', ['\Src\Controllers\UserController', 'profile']],

    ['/\/updateprofile/', ['\Src\Controllers\UserController', 'updateprofile']],

    ['/\/updateprofilepost/', ['\Src\Controllers\UserController', 'updateprofilepost']],

    ['/\/addhome/', ['\Src\Controllers\HomeController', 'addhome']],

    ['/\/addhomepost/', ['\Src\Controllers\HomeController', 'addhomepost']],

    ['/\/addguest\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addguest']],

    ['/\/addguestpost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addguestpost']],

    ['/\/deleteguest\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'deleteguest']],

    ['/\/deleteguestpost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'deleteguestpost']],

    ['/\/deletehome\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'deletehome']],

    ['/\/myhomes/', ['\Src\Controllers\HomeController', 'myhomes']],

    ['/\/home\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'home']],

    ['/\/addroom\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addRoom']],

    ['/\/addroompost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addRoomPost']],

    ['/\/allhomes/', ['\Src\Controllers\AdminController', 'allhomes']],   //admin

    ['/\/searchuser\//', ['\Src\Controllers\AdminController', 'searchuser']],

    ['/\/searchuser\/(?<term>.+)/', ['\Src\Controllers\AdminController', 'searchuser']],
];
