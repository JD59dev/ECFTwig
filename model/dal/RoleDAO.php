<?php

class RoleDAO extends Dao
{

    public function getAll()
    {
        // try {
        //     $q = $this->BDD->prepare("SELECT personnage, idRole, acteurs.nom, acteurs.prenom FROM `roles`
        //     INNER JOIN acteurs ON roles.idActeur = acteurs.idActeur
        //     INNER JOIN films ON roles.idFilm = films.idFilm
        //     ");

        //     $q->execute();
        //     $roles = [];

        //     while ($data = $q->fetch()) {
        //         $roles = new Role($data['personnage'], $data['idRole'], $data[]);
        //     }
        // } catch (Exception $err) {
        //     return "ERROR : " . $err->getMessage();
        // }
        // return ($roles);
    }

    public function add($data)
    {
    }

    public function getOne($id)
    {
    }
}
