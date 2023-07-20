<?php

class Role
{
    private $idActeur;
    private $idFilm;
    private $personnage;
    private $idRole;
    private $test;

    public function __construct($idActeur, $idFilm, $personnage, $idRole, $test)
    {
        $this->setIdActeur($idActeur);
        $this->setIdFilm($idFilm);
        $this->setPersonnage($personnage);
        $this->setIdRole($idRole);
        $this->setTest($test);
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

        return $this;
    }

    /**
     * Get the value of idFilm
     */
    public function getIdFilm()
    {
        return $this->idFilm;
    }

    /**
     * Set the value of idFilm
     *
     * @return  self
     */
    public function setIdFilm($idFilm)
    {
        $this->idFilm = $idFilm;

        return $this;
    }

    /**
     * Get the value of personnage
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }

    /**
     * Set the value of personnage
     *
     * @return  self
     */
    public function setPersonnage($personnage)
    {
        $this->personnage = $personnage;

        return $this;
    }

    /**
     * Get the value of idRole
     */
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * Set the value of idRole
     *
     * @return  self
     */
    public function setIdRole($idRole)
    {
        $this->idRole = $idRole;

        return $this;
    }

    /**
     * Get the value of test
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Set the value of test
     *
     * @return  self
     */
    public function setTest($test)
    {
        $this->test = $test;

        return $this;
    }
}
