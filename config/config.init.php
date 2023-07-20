<?php
// Initialisation de la session
session_start();


// Chargement Smarty et Defines
require 'config/defines.inc.php';
// Load Our autoloader
require 'config/Autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('view');
$twig = new \Twig\Environment($loader);


// Ajout d'une variable globale pour le session du user
$twig->addGlobal('session', $_SESSION);
