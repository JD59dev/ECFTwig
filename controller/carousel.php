<?php

$filmsDao = new FilmsDAO();
$listFilm = null;
$listActeurs;
$msg = "";

try {
    $listFilm = $filmsDao->getAll("");
    // var_dump($listFilm);
} catch (Exception $err) {
    $msg = "ERROR : " . $err->getMessage();
}
// var_dump($listFilm);
echo $twig->render('carousel.html.twig', [
    'listFilm' => $listFilm,
    'msg' => $msg
]);
