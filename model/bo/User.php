<?php

class User {

    private $idUser;
    private $userName;
    private $email;
    private $password;
    private $pwdRepeat;


public function __construct($idUser, $userName, $email, $password, $pwdRepeat=null) 
{
    $this->setIdUser($idUser);
    $this->setUserName($userName);
    $this->setEmail($email);
    $this->setPassword($password);
    $this->setPwdRepeat($pwdRepeat);
}

public function emptyInputRegister()
{
    if (empty($this->getUserName()) || empty($this->getEmail()) || empty($this->getPassword()) || empty($this->getPwdRepeat())) {
        return $message="Veuillez remplir tous les champs.";
    }
    return true;
}

public function validUserName()
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $this->getUserName())) {
        return $message="Le nom d'utilisateur ne doit contenir que des lettres et des chiffres.";
    }
    return true;
}

public function validEmail()
{
    if (!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)) {
        return $message="Veuillez saisir une adresse email valide.";
    }
    return true;
}

public function validPassword($password)
{
    if (strlen($password) < 8 || !preg_match("/\d/", $password) || !preg_match("/[^A-Za-z\d]/", $password)) {
        return $message="Le mot de passe doit contenir au moins 8 caractères dont 1 chiffre et 1 caractère spécial.";
    }
    return true;
}

public function passwordMatch()
{
    if ($this->getPassword() !== $this->getPwdRepeat()) {
        return $message="Les mots de passe ne correspondent pas.";
    }
    return true;
}




public function getPwdRepeat()
{
    return $this->pwdRepeat;
}

public function setPwdRepeat($pwdRepeat)
{
    $this->pwdRepeat=$pwdRepeat;
}
    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

    }

    /**
     * Get the value of userName
     */ 
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */ 
    public function setUserName($userName)
    {
        $this->userName = $userName;

    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

    }
}