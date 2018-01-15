<?php

/** @var Array[] $routes */
$routes = [
    ['/\//', ['\Src\Controllers\IndexController', 'index']],

    ['/\/about/', ['\Src\Controllers\AboutController', 'about']],

    ['/\/contact/', ['\Src\Controllers\IndexController', 'contact']],

    ['/\/faq/', ['\Src\Controllers\IndexController', 'faq']],

    ['/\/cgu/', ['\Src\Controllers\IndexController', 'cgu']],

    ['/\/member\/(?<id>[0-9]+)/', ['\Src\Controllers\IndexController', 'member']],

    ['/\/login/', ['\Src\Controllers\UserController', 'login']],

    ['/\/login_admin/', ['\Src\Controllers\AdminController', 'login']], //admin

    ['/\/logout/', ['\Src\Controllers\UserController', 'logout']],

    ['/\/register/', ['\Src\Controllers\UserController', 'register']],

    ['/\/registerpost/', ['\Src\Controllers\UserController', 'registerpost']],

    ['/\/loginpost/', ['\Src\Controllers\UserController', 'loginpost']],

    ['/\/login_adminpost/', ['\Src\Controllers\AdminController', 'loginpost']], //admin

    ['/\/profile/', ['\Src\Controllers\UserController', 'profile']],

    ['/\/profileadmin/', ['\Src\Controllers\AdminController', 'profileAdmin']],

    ['/\/updateprofile/', ['\Src\Controllers\UserController', 'updateprofile']],

    ['/\/updateadmin/', ['\Src\Controllers\AdminController', 'updateAdmin']],

    ['/\/updateprofilepost/', ['\Src\Controllers\UserController', 'updateprofilepost']],

    ['/\/addticket/', ['\Src\Controllers\UserController', 'addticket']],

    ['/\/addticketpost/', ['\Src\Controllers\UserController', 'addticketpost']],

    ['/\/updateadminpost/', ['\Src\Controllers\AdminController', 'updateAdminPost']], //admin

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

    ['/\/addstuff\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addStuff']],

    ['/\/addcemacpost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addCemacPost']],

    ['/\/addsensororactuatorpost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addSensorOrActuatorPost']],

    ['/\/notification_maintenance_post/', ['\Src\Controllers\AdminController', 'notificationForMaintenancePost']], //admin

    ['/\/home\/(?<id>[0-9]+)\/(?<term>.+)/', ['\Src\Controllers\HomeController', 'room']],

    ['/\/home\/(?<id>[0-9]+)\/(?<term1>.+)\/(?<term2>.+)/', ['\Src\Controllers\HomeController', 'sensordetail']],

    ['/\/home\/(?<id>[0-9]+)\/(?<term1>.+)/', ['\Src\Controllers\HomeController', 'order']],

    ['/\/home\/(?<id>[0-9]+)\/(?<term1>.+)/', ['\Src\Controllers\HomeController', 'orderpost']],
];
