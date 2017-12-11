<?php

namespace Src\Model;

use \PDO;

class Cemac {

    private $bdd;

    /**
     * userstaffstaff constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host='.DB_HOST.';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    ###################
    # COMMANDES CEMAC #
    ###################

    /**
     *
     *
     * @return Cemac
     */

    public function getCemacByRoom($roomId){
        $req = $this->bdd->prepare('SELECT * FROM cemac WHERE roomId = :roomId');
        $req->execute([
            ':roomId' => $roomId
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }

    public function getCemacByApartment($apartmentId){
        $req = $this->bdd->prepare('SELECT cemac.* FROM cemac INNER JOIN room ON cemac.roomId = room.id 
                                              INNER JOIN apartment ON apartment.id = room.apartmentId WHERE apartment.id = :id ');
        $req->execute(
            [':id' => $apartmentId ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


}

?>