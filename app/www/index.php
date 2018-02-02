<?php

session_start();

ini_set('display_errors', 1);

require_once('../config/config.php');
require_once('../config/router.php');

/**
 * Charge une classe en utilisant son Namespace comme structure de dossier
 *
 * @param $classname
 * @throws Error
 *
 */
function __autoload($classname)
{
    $path = '../' . str_replace('\\', DIRECTORY_SEPARATOR, $classname) . '.php';
    $path = strtolower($path);
    if (!file_exists($path)) {
        throw new Error("File does not exist : $path");
    }
    require_once(__DIR__.'/'.$path);
}


// Récupérer la route depuis l'URL
// URL Rewrite doit être activé
if (isset($_GET['q'])) {
    $uri = '/' . $_GET['q'];
}
else {
    $uri = '/';
}



/*
 * Ce bloc a comme objectif de récupérer le nom du controller à instancier
 * Et d'appeler la méthode qui convient avec les paramètrs de requête
 */
try {
    // On commence par récupérer toutes les routes qui matchent l'URI appelée
    $routesMatched = [];
    $params = [];
    for ($i = 0 ; $i < sizeof($routes) ; $i++) {
        if(preg_match($routes[$i][0], $uri, $params[$i])) {
            array_push($routesMatched, $routes[$i]);
        } else {
            unset($params[$i]);
        }
    }

    // Si aucune route n'a matché, on envoie une erreur
    if(sizeof($routesMatched) == 0) {
        throw new Exception("No route matched for called URI");
    }

    // Le tableau 'param' contient aussi les paramètres des routes non matchées.
    // On appelle cette fonction après tous les unset() pour que les indexes se calculent à nouveau
    $params = array_values($params);

    $route = $routesMatched[0];
    $param = $params[0];
    // Si plus d'une route a été matchée, on assigne la route avec la regex la plus longue
    if (sizeof($routesMatched) > 1) {
        for ($i = 1 ; $i < sizeof($routesMatched) ; $i++) {
            if(strlen($routesMatched[$i][0]) > strlen($route[0])) {
                $route = $routesMatched[$i];
                $param = $params[$i];
            }
        }
    }

    $controller = new $route[1][0]();

    $methode = $route[1][1] . 'Action';
    if (!method_exists($controller, $methode)) {
        throw new Error("Cound not find action for route : $route");
    }

    echo $controller->$methode($param);

} catch (Error $e) {
    // @TODO : Gérer les erreurs avec une page d'erreur
    echo "<pre>";
    echo $e;
    echo "</pre>";
    // On peut récupérer la trace avec $e->getTrace();
    die();
}