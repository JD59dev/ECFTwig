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






}