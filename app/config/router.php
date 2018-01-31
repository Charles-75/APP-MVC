<?php

/** @var Array[] $routes */
$routes = [
    ['/\//', ['\Src\Controllers\IndexController', 'index']],

    ['/\/about/', ['\Src\Controllers\IndexController', 'about']],

    ['/\/contact/', ['\Src\Controllers\IndexController', 'contact']],

    ['/\/faq/', ['\Src\Controllers\IndexController', 'faq']],

    ['/\/cgu/', ['\Src\Controllers\IndexController', 'cgu']],

    ['/\/newsletter/', ['\Src\Controllers\IndexController', 'newsletter']],    

    ['/\/member\/(?<id>[0-9]+)/', ['\Src\Controllers\IndexController', 'member']],

    ['/\/login/', ['\Src\Controllers\UserController', 'login']],

    ['/\/login_admin/', ['\Src\Controllers\AdminController', 'login']], //admin

    ['/\/logout/', ['\Src\Controllers\UserController', 'logout']],

    ['/\/logout_admin/', ['\Src\Controllers\AdminController', 'logout']],  //admin

    ['/\/register/', ['\Src\Controllers\UserController', 'register']],

    ['/\/registerpost/', ['\Src\Controllers\UserController', 'registerpost']],

    ['/\/loginpost/', ['\Src\Controllers\UserController', 'loginpost']],

    ['/\/login_adminpost/', ['\Src\Controllers\AdminController', 'loginpost']], //admin

    ['/\/profile/', ['\Src\Controllers\UserController', 'profile']],

    ['/\/profileadmin/', ['\Src\Controllers\AdminController', 'profileAdmin']],

    ['/\/updateprofile/', ['\Src\Controllers\UserController', 'updateprofile']],

    ['/\/changepassword/', ['\Src\Controllers\UserController', 'changePassword']],

    ['/\/changepasswordpost/', ['\Src\Controllers\UserController', 'changePasswordPost']],

    ['/\/changepasswordadmin/', ['\Src\Controllers\AdminController', 'changePassword']],

    ['/\/changepasswordadminpost/', ['\Src\Controllers\AdminController', 'changePasswordPost']],

    ['/\/updateadmin/', ['\Src\Controllers\AdminController', 'updateAdmin']],
    
    ['/\/updateprofilepost/', ['\Src\Controllers\UserController', 'updateprofilepost']],

    ['/\/updateadminpost/', ['\Src\Controllers\AdminController', 'updateAdminPost']], //admin

    ['/\/addticket/', ['\Src\Controllers\UserController', 'addticket']],

    ['/\/addticketpost/', ['\Src\Controllers\UserController', 'addticketpost']],

    ['/\/tickethistoric/', ['\Src\Controllers\UserController', 'ticketHistoric']],

    ['/\/ticketadmin/', ['\Src\Controllers\AdminController', 'ticketAdmin']],

    ['/\/viewticket\/(?<id>[0-9]+)/', ['\Src\Controllers\UserController', 'viewTicket']],

    ['/\/viewticketadmin\/(?<id>[0-9]+)/', ['\Src\Controllers\AdminController', 'viewTicketAdmin']],

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

    ['/\/deleteroom\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'deleteRoom']],

    ['/\/deleteroompost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'deleteRoomPost']],

    ['/\/allhomes/', ['\Src\Controllers\AdminController', 'allhomes']],   //admin
    
    ['/\/searchuser\//', ['\Src\Controllers\AdminController', 'searchuser']], 
    
    ['/\/searchuser\/(?<term>.+)/', ['\Src\Controllers\AdminController', 'searchuser']],

    ['/\/addgear\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addStuff']],

    ['/\/addcemacpost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addCemacPost']],

    ['/\/addsensororactuatorpost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'addSensorOrActuatorPost']],

    ['/\/deletecemac\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'deleteCemac']],

    ['/\/deletecemacpost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'deleteCemacPost']],

    ['/\/notification_maintenance_post/', ['\Src\Controllers\AdminController', 'notificationForMaintenancePost']], //admin

    ['/\/delete_notification\/(?<id>[0-9]+)/', ['\Src\Controllers\AdminController', 'deleteNotification']], //admin

    ['/\/room\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'room']],

    ['/\/order\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'order']],

    ['/\/orderpost\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'orderPost']],

    ['/\/simulationcapteurs\/(?<id>[0-9]+)/', ['\Src\Controllers\HomeController', 'testSimulation']],

   
    
     ['/\/deleteorder\/(?<id>[0-9]+)\/(?<idordre>[0-9]+)/', ['\Src\Controllers\SensorController', 'deleteOrder']],
    
];
