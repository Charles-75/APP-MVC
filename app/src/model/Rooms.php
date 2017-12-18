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
     * @param $homeId int
     * @return Room[]
     */
    public function getRoomsByHomeId($homeId)
    {
        try {
            $req = $this->bdd->prepare("SELECT name FROM room WHERE apartmentId = :id");
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


    public function addRoom($roomName, $homeId){   //retourne rien
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


    public function getRoomsByUserId($userId){
        $req = $this->bdd->prepare("SELECT room.* FROM room INNER JOIN apartement 
                                              WHERE apartment.id = room.apartmentId WHERE apartent.idUser = :userId");
        $req->execute([
            ':userId' => $userId
        ]);

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function insertRoom($name, $apartmentId){
        try{
            $req = $this->bdd->prepare("INSERT INTO room(name, apartmentId) VALUES(:name, :apartmentId)");
            $req->execute([
                'name' => $name,
                'apartmentId' => $apartmentId,
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

?>