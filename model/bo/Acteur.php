<?php

class Acteur
{

    private $idActeur;
    private $nom;
    private $prenom;


    public function __construct(int $idActeur = null, string $nom, string $prenom)
    {

        $this->setIdActeur($idActeur);
    }

    /**
     * Get the value of idActeur
     */
    public function getIdActeur()
    {
        return $this->idActeur;
    }

    /**
     * Set the value of idActeur
     *
     * @return  self
     */
    public function setIdActeur($idActeur)
    {
        $this->idActeur = $idActeur;
    }
}
