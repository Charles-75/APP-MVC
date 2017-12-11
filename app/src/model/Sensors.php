<?php


namespace Src\Model;

use \PDO;


class Sensors
{
    private $bdd;

    /**
     * Sensor constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    #####################
    # COMMANDES SENSORS #
    #####################


    public function getSensorsByRooms($roomId){
        $req = $this->bdd->prepare("SELECT sensor.* FROM sensor INNER JOIN cemac ON sensor.cemacId = cemac.id
                                              WHERE cemac.roomId = :roomId ");
        $req->execute([
            ':roomId' => $roomId
        ]);

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    public function getSensorsValue($sensorId){
        $req = $this->bdd->prepare("SELECT id,sensor,value,date FROM value WHERE sensorId = :sensorId ");
        $req->execute([
            ':sensorId' => $sensorId
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function addSensors($sensorType, $sensorReference, $cemacId){
        $req = $this->bdd->prepare("INSERT INTO sensor VALUE (type = :type, reference = :reference, cemacId = :cemacId ");
        $req ->execute([
            ':type' => $sensorType,
            ':reference' => $sensorReference,
            'cemacId' => $cemacId
        ]);
    }

}