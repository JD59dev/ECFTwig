<?php

class RoleDAO extends Dao
{

    public function getAll($search)
    {
    }

    public function add($data)
    {
        try {
            $valeurs = ['personnage' => $data->getPersonnage(), 'acteur' => $data->getActeur()];
            $requete = 'INSERT INTO roles (personnage, acteur) VALUES (:personnage , :acteur)';
            $insert = $this->BDD->prepare($requete);
            if (!$insert->execute($valeurs)) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $err) {
            return "ERROR : " . $err->getMessage();
        }
    }




    public function getOne($id)
    {
    }
}
