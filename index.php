<?php

// Initialisation de l'environnement
require './config/config.init.php';

require _CTRL_ . 'header.php';
// if (isset($_SESSION['email'])) {
    // echo "<p>Bienvenue dans notre Médiathèque " . $_SESSION['userName'] . "</p>";
// } else {
    // echo "<p class='text-primary'>Connectez-vous pour créer des films.</p>";
// }

// Gestion de Routing
if (isset($_GET['action']) && file_exists(_CTRL_ . $_GET['action'] . '.php')) {
    require _CTRL_ . $_GET['action'] . '.php';
} elseif (isset($_GET['action']) && !file_exists(_CTRL_ . $_GET['action'] . '.php')) {
    require _CTRL_ . 'erreur.php';
} else {
    require _CTRL_ . 'carousel.php';
}

// require _CTRL_ . 'footer.php';
