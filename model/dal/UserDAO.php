<?php
class UserDAO extends Dao
{
    private function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function getAll()
    {
        $query = $this->BDD->prepare("SELECT id, email, password FROM users ORDER BY email");
        $query->execute();
        $users = array();
        while ($data = $query->fetch()) {
            $users[] = new User($data['id'], $data['userName'], $data['email'], $data['password']);
        }
        return ($users);
    }

    public function add($user)
    {
        $hashPassword = $this->hashPassword($user->getPassword());
        $valeurs = [':userName' => $user->getUserName(), 'email' => $user->getEmail(), 'password' => $hashPassword];
        $requete = 'INSERT INTO users (userName, email, password) VALUES (:userName, :email, :password)';
        $insert = $this->BDD->prepare($requete);
        if (!$insert->execute($valeurs)) {
            return false;
        } else {
            return true;
        }
    }


    public function getOne($email)
    {
        $query = $this->BDD->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(array(':email' => $email));
        $data = $query->fetch();
        if ($data) {
            $user = new User($data['id'], $data['userName'], $data['email'], $data['password']);
            return $user;
        }
        return null;
    }
}
    // public function delete($id)
    // {
    //     $query = $this->BDD->prepare('DELETE FROM users WHERE users.id = :id_user');
    //     $query->execute(array(':id_user' => $id));
    //     return true;
    // }

    // public function updateOne($user)
    // {
        // $query = $this->BDD->prepare('UPDATE users SET email = :email, password = :password WHERE id = :id');
        // $query->execute([
            // ':email' => $user->getEmail(),
            // ':password' => $user->getPassword(),
            // ':id' => $user->getId()
        // ]);
        // return ($query->rowCount() > 0);
    // } 
