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


    ##################
    # COMMANDES manager #
    ##################

    
}

?>