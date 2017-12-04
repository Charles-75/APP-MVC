<?php

namespace Src\Model;

use \PDO;

class Homes {

    private $bdd;

    /**
     * Manager constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host='.DB_HOST.';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    ###################
    # COMMANDES HOMES #
    ###################

    public function getAllHomes(){
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

}

?>