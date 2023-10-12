<?php
$connexion = mysqli_connect("localhost","root","","cosmeet");

if (!$connexion)
{
    die("Pas connecté");
}

ob_start();
session_start();

?>