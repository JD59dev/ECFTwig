<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$dossierSource = explode("/", $_SERVER['PHP_SELF']);

// Si on a pas ces infos, rien ne peut fonctionner : die
if (!isset($_SERVER['DOCUMENT_ROOT'])) {
    exit();
}

// Define de la racine du site
define('_PATH_', $_SERVER['DOCUMENT_ROOT'] . '/' . $dossierSource[1] . '/');
//echo _PATH_;

// Define du dossier Coeur
define('_MODEL_', 'model/');

// Define du dossier des Controleurs
define('_CTRL_', 'controller/');

// Define du dossier des Configs
define('_CONFIG_', 'config/');

// Define du dossier des TPL
define('_VIEW_', 'view/');
