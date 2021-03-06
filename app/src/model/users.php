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
    public function getUserByEmail($email) {
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
     * @param string $email
     * @param string $password
     * @return User
     */
    public function getUserByCredentials($email, $password, $passwordHashed=false) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
            $req->execute(([
                ':email' => $email,
                ':password' => !$passwordHashed ? hash("sha256",$password) : $password
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
    public function getUserById($id) {
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
    public function getUserBySurname($surname){
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

    public function getUserByName($firstname, $surname){
        try {
            $req = $this->bdd->prepare("SELECT * FROM user WHERE firstName = :firstname AND surname = :surname");
            $req->execute([
                ':firstname' => $firstname,
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

    public function insertUser($firstname, $surname, $email, $password, $phone){
        try{
            $req = $this->bdd->prepare("INSERT INTO user(firstName, surname, email, password, phoneNumber) VALUES(:firstname, :surname, :email, :password, :phone)");
            $req->execute([
                'firstname' => $firstname,
                'surname' => $surname,
                'email' => $email,
                'password' => $password,
                'phone' => $phone
            ]);
        }
        catch (\PDOException $e){
            return null;
        }
        catch (\Exception $e){
            return null;
        }
    }

    public function updateUserById($firstname, $surname, $email, $phone, $id){
        try{
            $req = $this->bdd->prepare("UPDATE user SET firstName = :firstname, surname = :surname, email = :email, phoneNumber = :phone WHERE id = :id");
            $req->execute([
                'firstname' => $firstname,
                'surname' => $surname,
                'email' => $email,
                'phone' => $phone,
                'id' => $id,
            ]);
        }
        catch (\PDOException $e){
            return null;
        }
        catch (\Exception $e){
            return null;
        }
    }

    public function updateUserPasswordById($password, $id){
        try{
            $req = $this->bdd->prepare("UPDATE user SET password = :password WHERE id = :id");
            $req->execute([
                'password' => $password,
                'id' => $id
            ]);
        }
        catch (\PDOException $e){
            return null;
        }
        catch (\Exception $e){
            return null;
        }
    }



    public function getUserLike($term){
        if(strlen($term) < 2) {
            return null;
        }
        try{
            $req = $this->bdd->prepare("SELECT * FROM user WHERE firstName LIKE :term OR surname LIKE :term"); // nom et/ou prénom
            $req->execute([
                ':term' => '%'.$term.'%'
            ]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        catch (\PDOException $e){
            return null;
        }
        catch (\Exception $e){
            return null;
        }

    }



}

?>
