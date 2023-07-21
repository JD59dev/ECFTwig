<?php

$filmsDao = new FilmsDAO();
$rolesDao = new RoleDAO();
$listFilm = null;

$msg = "";

try {
    $listFilm = $filmsDao->getAll();
    $listRoles = $rolesDao->getAll();
} catch (Exception $err) {
    $msg = "ERROR : " . $err->getMessage();
}
var_dump($listFilm);

echo $twig->render('carousel.html.twig', [
    'listFilm' => $listFilm,

    'msg' => $msg
]);
