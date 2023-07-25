<?php

$filmDao = new FilmsDAO();
$message = "";
$film = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['titre']) && !empty($_POST['realisateur']) && !empty($_POST['affiche']) && !empty($_POST['annee']) && !empty($_POST['roles'])) {
        $titre = $_POST['titre'];
        $realisateur = $_POST['realisateur'];
        $affiche = $_POST['affiche'];
        $annee = $_POST['annee'];
        $roles = $_POST['roles'];

        $film = new Film(null, $titre, $realisateur, $affiche, $annee, $roles);
        $ajouter = $filmDao->add($film);

        if ($ajouter) {
            $message =  "Ajout OK";
        } else {
            $message = "Erreur Ajout";
        }
    } else {
        $message = "Tous les champs du formulaire doivent être remplis.";
    }


echo $twig->render('creation_film.html.twig', ['erreur' => $message]);
