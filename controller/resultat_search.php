<?php

// $movieDao = new FilmsDAO();
// $chercheMovie = $movieDao->searchFilm();

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     $titre = $_GET['titre'];
//     $movie = new Film($id, $titre, $realisateur, $affiche, $annee);   
//     $chercheMovie = $movieDao->searchFilm($titre);
// }

// echo $twig->render('resultat_search.html.twig', [ 
//     'chercheMovie' => $chercheMovie
// ]);
$filmDao = new FilmsDAO();
$chercheMovie = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['titre'])) {
    $titre = $_POST['titre'];
    $chercheMovie = $filmDao->getAll($titre);
}
// var_dump($chercheMovie);
echo $twig->render('resultat_search.html.twig', [
    'chercheMovie' => $chercheMovie
]);
?>