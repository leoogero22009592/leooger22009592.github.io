<?php

require 'Noyau/ChargementAuto.php';

function __autoload($class_name) {
    include 'controllers/' . $class_name . '.php';
}

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller_name = $_GET['controller'] . 'Controleur';
    $action = $_GET['action'];
} else {
    $controller_name = 'InscriptionControleur';
    $action = 'afficherFormulaire';
}

$controller = new $controller_name();
$controller->$action();
?>