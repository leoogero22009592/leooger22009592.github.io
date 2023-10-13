<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Controleur\UsrControleur;

// Inclure le modèle de base
require 'Modele/UsrModels.php';

// Récupérer l'URI de la demande
$requestUri = $_SERVER['REQUEST_URI'];

// Supprimer les paramètres de l'URL
$cleanUri = strtok($requestUri, '?');

// Divisez l'URI en segments en utilisant '/'
$uriSegments = explode('/', trim($cleanUri, '/'));

$controllerName = isset($uriSegments[0]) ? ucfirst($uriSegments[0]) . 'Controleur' : 'AccueilController';
$action = isset($uriSegments[1]) ? $uriSegments[1] : 'accueil';

// Inclure le fichier du contrôleur spécifié
$controllerFile = "Controleur/{$controllerName}.php";

if (file_exists($controllerFile)) {
    require $controllerFile;

    // Instancier le contrôleur
    $controller = new $controllerName();

    // Vérifier si la méthode existe dans le contrôleur
    if (method_exists($controller, $action)) {
        call_user_func(array($controller, $action));
    } else {
        include('Vues/404.php');
    }
} else {
    include('Vues/Inscription.php');
}