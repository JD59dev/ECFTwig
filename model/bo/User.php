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
    $this->setpwdRepeat($pwdRepeat);
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