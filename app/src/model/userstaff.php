<?php

namespace Src\Model;

use \PDO;

class Userstaff {

    private $bdd;

    /**
     * userstaffstaff constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host='.DB_HOST.';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    #######################
    # COMMANDES USERSTAFF #
    #######################

    /**
     *
     *
     * @return userstaff[]
     */

    public function getAllUserstaff(){
        try {
            $req = $this->bdd->query("SELECT * FROM userstaff");
            return $req->fetchAll(PDO::FETCH_ASSOC); // récupérer que la partie associative
        }
        catch(\PDOException $e) {
            return [];
        }
        catch(\Error $e) {
            return [];
        }
    }

    /**
     * @param string $email
     * @return userstaff
     */
    public function getUserstaffByEmail(string $email) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM userstaff WHERE email = :email");
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
        catch (\Exception $e){
            return null;
        }

    }

    /**
     * @param int $id
     * @return userstaff
     */
    public function getUserstaffById(string $id) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM userstaff WHERE id = :id");
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
        catch (\Exception $e){
            return null;
        }

    }

    /**
     * @param string $surname
     * @return array|null
     */
    public function getUserstaffySurname(string $surname){
        try {
            $req = $this->bdd->prepare("SELECT * FROM userstaff WHERE surname = :surname");
            $req->execute([
                ':surname' => $surname
            ]);
            $res = $req->fetchALL(PDO::FETCH_ASSOC);
            return $res;
        }
        catch (\PDOException $e) {
            return null;
        }
        catch (\Exception $e){
            return null;
        }
    }


}

?>