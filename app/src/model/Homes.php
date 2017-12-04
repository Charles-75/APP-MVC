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


    public function getHomesByUserEmail($email) {
        $req = $this->bdd->prepare("
          SELECT apartment.*, (SELECT COUNT(*) FROM room WHERE apartmentId = apartment.id) AS roomsCount FROM apartment
          INNER JOIN user ON apartment.idUser = user.id
          WHERE user.email = :email
        ");
        $req->execute([':email' => $email]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoomsByHomeId($homeId) {
        $req = $this->bdd->prepare("SELECT * FROM room WHERE apartmentId = :id");
        $req->execute([':id' => $homeId]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    
}
