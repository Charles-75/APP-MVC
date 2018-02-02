<?php


namespace Src\Model;

use \PDO;

class Admins
{



    private $bdd;

    /**
     * Admin constructor.
     */

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host='.DB_HOST.';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    ###################
    # COMMANDES ADMIN #
    ###################


    public function getAdminByCredentials($email, $password, $passwordHashed=false) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM admin WHERE email = :email AND password = :password");
            $req->execute(([
                ':email' => $email,
                ':password' => !$passwordHashed ? hash('sha256', $password) : $password
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

    public function getAdminById($id) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM admin WHERE id = :id");
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

    public function updateAdminById($username, $email, $phone, $id){
        try{
            $req = $this->bdd->prepare("UPDATE admin SET username = :username, email = :email, phoneNumber = :phone WHERE id = :id");
            $req->execute([
                'username' => $username,
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

    public function updateAdminPasswordById($password, $id){
        try{
            $req = $this->bdd->prepare("UPDATE admin SET password = :password WHERE id = :id");
            $req->execute([
                'password' => hash('sha256', $password),
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


}