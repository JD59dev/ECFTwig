<?php
$filmDao = new FilmsDAO();
$listFilm = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['titre'])) {
    $titre = $_POST['titre'];
    $listFilm = $filmDao->getAll($titre);
}

echo $twig->render('carousel.html.twig', [
    'listFilm' => $listFilm
]);
?>