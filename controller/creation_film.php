<?php

$filmDao = new FilmsDAO();
$acteurDao = new ActeurDAO();
$roleDao = new RoleDAO();
$message = "";
$film = null;
$acteur = null;
$role = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['titre']) && !empty($_POST['realisateur']) && !empty($_POST['affiche']) && !empty($_POST['annee']) && !empty($_POST['role'])) {
    $titre = $_POST['titre'];
    $realisateur = $_POST['realisateur'];
    $affiche = $_POST['affiche'];
    $annee = $_POST['annee'];
    $roles = $_POST['role'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $film = new Film(null, $titre, $realisateur, $affiche, $annee);
    $ajouterFilm = $filmDao->add($film);

    //$idFilm = PDO::lastInsertId();



    //$idActeur = $pdo->lastInsertId();


    //foreach() { // Ajout des acteurs et des rôles concernés par le film ajouté

    //}
    //$idRole = $pdo->lastInsertId();


    if ($ajouterFilm && $ajouterActeur && $ajouterRole) {
        $message =  "Ajout OK";
    } else {
        $message = "Erreur Ajout";
    }
} else {
    $message = "Tous les champs du formulaire doivent être remplis.";
}


echo $twig->render('creation_film.html.twig', ['erreur' => $message]);
