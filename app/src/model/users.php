<?php

namespace Src\Model;

use \PDO;

class Users {

    private $bdd;

    /**
     * Users constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host='.DB_HOST.';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return User[]
     */
    public function getAllUsers(){
        try {
            $req = $this->bdd->query("SELECT * FROM user");
            return $req->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(\PDOException $e) {
            return [];
        }
        catch(Error $e) {
            return [];
        }
    }

    /**
     * @param string $email
     * @return User
     */
    public function getUserByEmail(string $email) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM user WHERE email = :email");
            $req->execute([
                ':email' => $email
            ]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            if(sizeof($res) == 1) return $res[0];
            else return null;
        }
        catch(\PDOException $e) {
            return null;
        }

    }

    /**
     * @param int $id
     * @return User
     */
    public function getUserById(string $id) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM user WHERE id = :id");
            $req->execute([
                ':id' => $id
            ]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            if(sizeof($res) == 1) return $res[0];
            else return null;
        }
        catch(\PDOException $e) {
            return null;
        }

    }


}


?>