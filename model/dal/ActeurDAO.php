<?php

class ActeurDAO extends Dao
{
// Affichage de tous les acteurs et films realisés
public function getAll()
{
    $q = $this->BDD->prepare("SELECT * FROM `acteurs` 
    INNER JOIN roles ON acteurs.idActeur = roles.idActeur
    INNER JOIN films ON role.idFilm = films.idFilm");

    $q->execute();
    $acteur = [];

while ($data = $q->fetch()) {
    $acteur[] = new Acteur($data['idActeur'], $data['nom'], $data['prenom']);
}
return ($acteur);

}

    // Ajout d'un acteur
    public function add($data)
    {

        $values = ['nom' => $data->getNom(), 'prenom' => $data->getPrenom()]; 
        $q = "INSERT INTO acteurs (nom, prenom) VALUES (:nom, :prenom)";

        $insert = $this->BDD->prepare($q); 

        if (!$insert->execute($values)) {
            return false;
        } else {
            return true;
        }
 
    }

    // Recherche d'un acteur

    // verifier si correcte!!!!!!!!!!!!!!!
    public function getOne($nom)
    {
        $q = $this->BDD->prepare("SELECT * FROM acteurs WHERE nom = :nom");
        $q->execute([":nom" => $nom]);
        $data = $q->fetch(); // Récupération des résultats
        $acteur = new Acteur($data['nom'], $data['prenom']); 

        return ($acteur);
    }




}