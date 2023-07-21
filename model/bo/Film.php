<?php

class Film
{

    private $id;
    private $titre;
    private $realisateur;
    private $affiche;
    private $annee;
    private $acteur;

    public function __construct(int $id, string $titre, string $realisateur, string $affiche, int $annee, $acteur = [])
    {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setRealisateur($realisateur);
        $this->setAffiche($affiche);
        $this->setAnnee($annee);
        $this->setActeur($acteur);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * Get the value of realisateur
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set the value of realisateur
     *
     * @return  self
     */
    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;
    }

    /**
     * Get the value of affiche
     */
    public function getAffiche()
    {
        return $this->affiche;
    }

    /**
     * Set the value of affiche
     *
     * @return  self
     */
    public function setAffiche($affiche)
    {
        $this->affiche = $affiche;
    }

    /**
     * Get the value of annee
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set the value of annee
     *
     * @return  self
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;
    }

    /**
     * Get the value of acteur
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * Set the value of acteur
     *
     * @return  self
     */
    public function setActeur($acteur)
    {
        $this->acteur = $acteur;

        return $this;
    }
}
