<?php

$filmsDao = new FilmsDAO();
$listFilm = null;
$listId = null;
$msg = "";

try {
    $listFilm = $filmsDao->getAll();
    $listId = $filmsDao->getIdFilm();
} catch (Exception $err) {
    $msg = "ERROR : " . $err->getMessage();
}
//var_dump($listFilm);

echo $twig->render('carousel.html.twig', [
    'listFilm' => $listFilm,
    'listId' => $listId,
    'msg' => $msg
]);
