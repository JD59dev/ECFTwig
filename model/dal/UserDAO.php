<?php
class UserDAO extends Dao
{
    private function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function getAll($search)
    {
        try {
            $query = $this->BDD->prepare("SELECT id, email, password FROM users ORDER BY email");
            $query->execute();
            $users = array();
            while ($data = $query->fetch()) {
                $users[] = new User($data['id'], $data['userName'], $data['email'], $data['password']);
            }
        } catch (Exception $err) {
            return "ERROR : " . $err->getMessage();
        }
        return ($users);
    }

    public function add($user)
    {
        try {
            $hashPassword = $this->hashPassword($user->getPassword());
            $valeurs = [':userName' => $user->getUserName(), 'email' => $user->getEmail(), 'password' => $hashPassword];
            $requete = 'INSERT INTO users (userName, email, password) VALUES (:userName, :email, :password)';
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


    public function getOne($email)
    {
        try {
            $query = $this->BDD->prepare('SELECT * FROM users WHERE email = :email');
            $query->execute(array(':email' => $email));
            $data = $query->fetch();
            if ($data) {
                $user = new User($data['id'], $data['userName'], $data['email'], $data['password']);
                return $user;
            }
        } catch (Exception $err) {
            return "ERROR : " . $err->getMessage();
        }
        return null;
    }

    public function emailExists($email)
    {
        try {
            $query = $this->BDD->prepare('SELECT COUNT(*) AS count FROM users WHERE email = :email');
            $query->execute([':email' => $email]);
            $data = $query->fetch();
            return $data['count'] > 0;
        } catch (Exception $err) {
            return "ERROR: " . $err->getMessage();
        }
    }
    public function userNameExists($userName)
{
    try {
        $query = $this->BDD->prepare('SELECT COUNT(*) AS count FROM users WHERE userName = :userName');
        $query->execute([':userName' => $userName]);
        $data = $query->fetch();
        return $data['count'] > 0;
    } catch (Exception $err) {
        $this->message = "Erreur : " . $err->getMessage();
        return false;
    }
}
        
        
        
    
}


   
   
   
   
   
   
   
   
   
   
   