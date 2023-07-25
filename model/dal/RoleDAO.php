<?php

class RoleDAO extends Dao
{

    public function getAll($search)
    {
    }

    public function add($data)
    {
        try {
            $valeurs = ['personnage' => $data->getPersonnage()];
            $requete = 'INSERT INTO roles (personnage) 
                SELECT personnage FROM roles
                INNER JOIN films ON films.idFilm = roles.idFilm
                INNER JOIN acteurs ON acteur.idActeur = roles.idActeur';
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
