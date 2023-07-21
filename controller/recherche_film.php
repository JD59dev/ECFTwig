<?php

$movieDao = new FilmsDAO();
$chercheMovie = $movieDao->searchFilm();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = $_GET['titre'];
    $movie = new Film($id, $titre, $realisateur, $affiche, $annee);   
    $chercheMovie = $movieDao->searchFilm($titre);
}

echo $twig->render('resultat_search.html.twig', [ 
    'chercheMovie' => $chercheMovie
]);
?>

