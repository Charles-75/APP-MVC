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

    public function getRoomNameSensorValueSensorType(){
        $req=$this->bdd->query("SELECT sensor.typeId,value.value,room.name FROM room
                                         INNER JOIN cemac ON room.id=cemac.roomId
                                         INNER JOIN sensor ON sensor.cemacId=cemac.id
                                         INNER JOIN value ON value.sensorId=sensor.id ");
        $res = $req ->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public function getSensorByType()
    {
        $req = $this->bdd->query(" SELECT  DISTINCT typeId FROM sensor ");

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

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
        $req = $this->bdd->prepare("INSERT INTO sensor(type,reference,cemacId) VALUES(:type, :reference, :cemacId)");
        $req ->execute([
            ':type' => $sensorType,
            ':reference' => $sensorReference,
            ':cemacId' => $cemacId
        ]);
    }


    public function getSensorPanneById(){

            $req = $this->bdd->query('SELECT id FROM SENSOR WHERE sensor.panne == 1');
            $res = $req->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        }

    public function updateSensorPanne($sensorId){
        $req = $this->bdd->prepare('UPDATE sensor SET panne = 1 WHERE id == :sensorId');
        $req->execute([
            ':sensorId' => $sensorId
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }



    public function deleteAllSensors($cemacId){
        try{
            $req = $this->bdd->prepare("DELETE FROM sensor WHERE cemacId = :id");
            $req->execute([
                'id' => $cemacId,
            ]);
        }
        catch (\PDOException $e){
            return null;
        }
        catch (\Exception $e){
            return null;
        }
    }

    public function getAllSensorTypes() {
        $req = $this->bdd->query("SELECT * FROM sensortype");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}