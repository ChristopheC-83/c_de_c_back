<?php

require_once("./models/pdo.model.php");
class MainManager extends Model
{

    public function getAllUsers (){ 
        $req = "SELECT * FROM users";
        $stmt = $this->getDB()->prepare($req);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $users;
    
    }
    public function getUserInfo($name)
    {
        $req = "SELECT * FROM users WHERE name = :name";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }
    public function getPasswordUser($name)
    {
        $req = "SELECT password FROM users WHERE name = :name";
        $stmt = $this->getDB()->prepare($req);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat['password'];
    }
    public function isCombinationValid($name, $password)
    {
        $passwordDB = $this->getPasswordUser($name);
        return password_verify($password, $passwordDB);
    }


   
}


