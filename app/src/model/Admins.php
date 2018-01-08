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


    public function getAdminByCredentials($email, $password) {
        try {
            $req = $this->bdd->prepare("SELECT * FROM admin WHERE email = :email AND password = :password");
            $req->execute(([
                ':email' => $email,
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

}