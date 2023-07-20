<?php

class Acteur {

private $idActeur;
private $nom;
private $prenom;


public function __construct($idActeur, $nom, $prenom) 
{

    $this->setIdActeur($idActeur);
    $this->setNom($nom);
    $this->setPrenom($prenom);

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

/**
 * Get the value of nom
 */ 
public function getNom()
{
return $this->nom;
}

/**
 * Set the value of nom
 *
 * @return  self
 */ 
public function setNom($nom)
{
$this->nom = $nom;

}

/**
 * Get the value of prenom
 */ 
public function getPrenom()
{
return $this->prenom;
}

/**
 * Set the value of prenom
 *
 * @return  self
 */ 
public function setPrenom($prenom)
{
$this->prenom = $prenom;

}
}