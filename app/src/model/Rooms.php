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
    public function getRoomIdAndNameByHomeId($homeId)
    {
        try {
            $req = $this->bdd->prepare("SELECT name,id FROM room WHERE apartmentId = :id");
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
    public function getRoomIdByName($roomName)
    {
        try {
            $req = $this->bdd->prepare("SELECT id FROM room WHERE name= :name");
            $req->execute([':name' => $roomName]);
            $res = $req->fetch(PDO::FETCH_ASSOC);
            return $res['id'];
        }
        catch(\PDOException $e) {
            return null;
        }
        catch(\Error $e) {
            return null;
        }
    }

    public function getLatestRoomsValuesByHome($homeId) {
        $req = $this->bdd->prepare("
          SELECT room.id, sensortype.name, sensortype.image, FLOOR(AVG(value.value)) AS averageValue
          FROM sensor
          INNER JOIN `value` ON `value`.sensorId = sensor.id
          INNER JOIN sensortype ON sensor.typeId = sensortype.id
          INNER JOIN cemac ON sensor.cemacId = cemac.id
          INNER JOIN room ON cemac.roomId = room.id
          WHERE value.id IN (
          SELECT MAX(value.id)
            FROM value
            GROUP BY value.sensorId
          )
          AND room.apartmentId = :homeId
          GROUP BY `value`.sensorId
        ");
        $req->execute(['homeId' => $homeId]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
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

    public function deleteRoom($roomId){
        try{
            $req = $this->bdd->prepare("DELETE FROM room WHERE id = :id");
            $req->execute([
                'id' => $roomId,
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