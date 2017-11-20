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
        $this->bdd = new PDO('mysql:host=mysql;dbname=app', DB_USER, DB_PASSWORD);
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
            $res = $this->bdd
                ->prepare("SELECT * FROM user WHERE email=:email")
                ->bindParam('email', $email)
                ->execute()
                ->fetchAll(PDO::FETCH_ASSOC);
            if(sizeof($res) == 1) return $res[0];
            else return null;
        }
        catch(\PDOException $e) {
            return null;
        }

    }


}


?>