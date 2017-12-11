<?php

namespace Src\Model;

use \PDO;

class Rooms {

    private $bdd;

    /**
     * Rooms constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host='.DB_HOST.';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    ##################
    # COMMANDES ROOM #
    ##################

    /**
     *
     *
     * @return Rooms
     */
    public function getRoomsByHomeId($homeId)
    {
        try {
            $req = $this->bdd->prepare("SELECT * FROM room WHERE apartmentId = :id");
            $req->execute([':id' => $homeId]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        catch(\PDOException $e) {
            return null;
        }
        catch(\Error $e) {
            return null;
        }
    }


    public function addRooms($roomName, $homeId){   //retourne rien
        try {
            $req = $this->bdd->prepare("INSERT INTO room(name, homeId) VALUES(:name, :homeId)");
            $req->execute([
                ':name' => $roomName,
                ':homeId' => $homeId
            ]);
        }
        catch(\PDOException $e) {
            return null;
        }
        catch(\Error $e) {
            return null;
        }
    }


}

?>