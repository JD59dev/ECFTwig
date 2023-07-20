<?php

class FilmsDAO extends Dao
{
    // Affichage de tous les films réalisés par les réalisateurs et acteurs concernés
    public function getAll()
    {
        $q = $this->BDD->prepare("SELECT * FROM films
        INNER JOIN roles ON films.idFilm = roles.idFilm
        INNER JOIN acteurs ON roles.idActeur = acteurs.idActeur
        WHERE films.titre = :titre");
        $q->execute();
        $movies = [];

        while ($data = $q->fetch()) {
            $movies[] = new Film($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
        }
        return ($movies);
    }

    // Ajout d'un film
    public function add($data)
    {
        $values = ['titre' => $data->getTitre(), 'realisateur' => $data->getRealisateur(), 'affiche' => $data->getAffiche(), 'annee' => $data->getAnnee()]; // Initialisation des valeurs pour la requête

        $q = "INSERT INTO films (titre, realisateur, affiche, annee) 
        VALUES (:titre, :realisateur, :affiche, :annee)"; // Initialisation de la requête

        $insert = $this->BDD->prepare($q); // Exécution de la requête

        if (!$insert->execute($values)) {
            return false;
        } else {
            return true;
        }
    }

    // Recherche d'un film
    public function getOne($titre)
    {
        $q = $this->BDD->prepare("SELECT * FROM films WHERE titre = :titre");
        $q->execute([":titre" => $titre]);
        $data = $q->fetch(); // Récupération des résultats
        $movie = new Film($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']); // Stockage dans la classe Film

        return ($movie);
    }
}
