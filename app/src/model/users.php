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


    ##################
    # COMMANDES USER #
    ##################

    /**
     *
     *
     * @return User[]
     */

    public function getAllUsers(){
        try {
            $req = $this->bdd->query("SELECT * FROM user");
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
        catch (\Exception $e){
            return null;
        }

    }

    /**
     * @param string $usernameOrEmail
     * @param string $password
     * @return User
     */
    public function getUserByCredentials(string $usernameOrEmail, string $password) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM user WHERE (email = :usernameOrEmail OR username = :usernameOrEmail) AND password = :password");
            $req->execute(([
                ':usernameOrEmail' => $usernameOrEmail,
                ':password' => $password
            ]));
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            if(sizeof($res) == 1) return $res[0];
            else return null;
        }
        catch(\PDOException $e) {
            return null;
        }
        catch(\Exception $e) {
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
        catch (\Exception $e){
            return null;
        }

    }

    /**
     * @param string $surname
     * @return array|null
     */
    public function getUserBySurname(string $surname){
        try {
            $req = $this->bdd->prepare("SELECT * FROM user WHERE surname = :surname");
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