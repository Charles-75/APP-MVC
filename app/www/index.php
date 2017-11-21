<?php

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
    if (!file_exists($path)) {
        throw new Error("File does not exist : $path");
    }
    require_once(__DIR__.'/'.$path);
}


// Récupérer la route depuis l'URL
// URL Rewrite doit être activé
if (isset($_GET['q'])) {
    $route = '/' . $_GET['q'];
}
else {
    $route = '/';
}




// Récupère le nom du controlle à instancier
try {
    // Si aucun controller n'est spécifié pour la route donnée : 404
    if (!isset($routes[$route][0])) {
        throw new Error("No controller specified for route : '" . $route . "'");
    } else {
        // Récupérer le nom de classe du controller
        /** @var \Core\Controller $controllerClass */
        $controllerClass = $routes[$route][0];
    }
} catch (Error $e) {
    // @TODO : Gérer les erreurs avec une page d'erreur
    echo "<pre>";
    echo $e;
    echo "</pre>";
    // On peut récupérer la trace avec $e->getTrace();
    die();
}

// Instancier le controller. Peut lancer une erreur si le fichier n'existe pas
$controller = new $controllerClass();

// Appeler la méthode correspondant
try {
    $methode = $routes[$route][1] . 'Action';
    if (!method_exists($controller, $methode)) {
        throw new Error("Cound not find action for route : $route");
    } else {
        echo $controller->$methode();
    }

} catch (Error $e) {
    // @TODO : Gérer les erreurs avec une page d'erreur
    echo "<pre>";
    echo $e;
    echo "</pre>";
    die();
}
