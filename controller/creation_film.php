<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titre']) && isset($_POST['annee'])) {
    $filmDao = new FilmsDAO(); // Initialisation du FilmDAO

    // Création du nouvel acteur, rôle et film avec les données du formulaire
    $film = new Film(null, $_POST['titre'], $_POST['realisateur'], $_POST['affiche'], $_POST['annee']);


    if (!empty($_POST['personnage'])) {
        foreach ($_POST['personnage'] as $key => $personnage) { // Ajout des acteurs et des rôles concernés par le film ajouté
            $acteur = new Acteur(null, $_POST['nom'][$key], $_POST['prenom'][$key]);
            $role = new Role(null, $_POST['personnage'][$key], $acteur);
            // Ajout du rôle au film
            $film->addRole($role);
        }
    }

    // Appel de la fonction add pour enregistrer le film, les acteurs et les rôles dans la BDD
    $check = $filmDao->add($film); // Retourne l'id du film ajouté

    //var_dump($_POST);
    //var_dump($film);

    if ($check) {
        $message =  "Film ajouté avec succès";
    } else {
        $message = "Erreur Ajout";
    }
} else {
    $message = "Tous les champs du formulaire doivent être remplis.";
}


echo $twig->render('creation_film.html.twig', ['erreur' => $message]);
