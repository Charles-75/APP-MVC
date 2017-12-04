<?php

namespace Src\Model;

use \PDO;

class Manager {

    private $bdd;

    /**
     * Manager constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host='.DB_HOST.';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    ##################
    # COMMANDES manager #
    ##################

    /**
     *
     *
     * @return manager[]
     */

    public function getAllManager(){
        try {
            $req = $this->bdd->query("SELECT * FROM manager");
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
     * @return manager
     */
    public function getManagerByEmail(string $email) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM manager WHERE email = :email");
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
     * @return manager
     */
    public function getManagerById(string $id) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM manager WHERE id = :id");
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
    public function getManagerBySurname(string $surname){
        try {
            $req = $this->bdd->prepare("SELECT * FROM manager WHERE surname = :surname");
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