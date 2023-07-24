<?php

class RoleDAO extends Dao
{

    public function getAll($search)
    {
    }

    public function add($data)
    {
        $valeurs = ['personnage' => $data->getPersonnage(), 'acteur' => $data->getActeur()];
        $requete = 'INSERT INTO roles (personnage, acteur) VALUES (:personnage , :acteur)';
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
