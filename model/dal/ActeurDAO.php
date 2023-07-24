<?php

class ActeurDAO extends Dao
{

    public function getAll($search)
    {
    }

    public function add($data)
    {
        $valeurs = ['nom' => $data->getNom(), 'prenom' => $data->getPrenom()];
        $requete = 'INSERT INTO acteur (nom, prenom) VALUES (:nom , :prenom)';
        $insert = $this->BDD->prepare($requete);
        if (!$insert->execute($valeurs)) {
            return false;
        } else {
            return true;
        }
    }

    
    

    public function getOne($id)
    {
    }
}
