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
        $this->bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=app', DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    #####################
    # COMMANDES SENSORS #
    #####################



    public function getSensorByType()
    {
        $req = $this->bdd->query(" SELECT  DISTINCT typeId FROM sensor ");

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
        $req = $this->bdd->prepare("INSERT INTO sensor(typeId,reference,cemacId) VALUES(:typeId, :reference, :cemacId)");
        $req ->execute([
            ':typeId' => $sensorType,
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


    public function getSensorId($sensorName) {

        $req = $this->bdd->prepare("SELECT id FROM sensor WHERE reference = :reference");
        $req->execute([
            "reference" => $sensorName
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($res) == 1){ return $res[0];};

    }

    public function getSensorByCemacId($cemacId) {

        $req = $this->bdd->prepare("SELECT sensor.* FROM sensor INNER JOIN cemac ON sensor.cemacId = cemac.id WHERE cemac.id = :cemacId");
        $req->execute([
            ':cemacId' => $cemacId
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($res) == 1){ return $res[0];};

    }

     public function getSensorsByRooms($roomId){
        $req = $this->bdd->prepare("SELECT sensor.*, sensortype.name AS type FROM sensor
                                              INNER JOIN cemac ON sensor.cemacId = cemac.id
                                              INNER JOIN sensortype ON sensor.typeId = sensortype.id
                                              WHERE cemac.roomId = :roomId ");
        $req->execute([
            ':roomId' => $roomId
        ]);

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    public function getSensorsLastValuesByRoom($roomId) {
         $req = $this->bdd->prepare("SELECT sensor.*, `value`.value, sensortype.displayname AS type FROM sensor
                                               INNER JOIN cemac ON sensor.cemacId = cemac.id
                                               INNER JOIN sensortype ON sensor.typeId = sensortype.id
                                               INNER JOIN `value` ON `value`.sensorId = sensor.id
                                               WHERE value.id IN (
                                                  SELECT MAX(value.id)
                                                    FROM value
                                                    GROUP BY value.sensorId
                                                  )
                                               AND cemac.roomId = :roomId");
         $req->execute(['roomId' => $roomId]);
         return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSensorByApartmentId($apartmentId){
        $req=$this->bdd->query("SELECT sensor.id as sensorId,sensor.typeId,room.id,sensor.reference FROM sensor  
                                        INNER JOIN cemac ON sensor.cemacId =cemac.id
                                        INNER JOIN room ON room.id=cemac.roomId");

        $res= $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }
    public function updateSensorValue($sensorId,$value){
        $req = $this->bdd->prepare("INSERT INTO `value` (value, date, sensorId) VALUES(:val, NOW(), :sensorId) ");
        $req->execute([
            ':val' => $value,
            ':sensorId' => $sensorId,
        ]);
    }

    public function deleteValues($sensorId){
        try{
            $req = $this->bdd->prepare("DELETE FROM value WHERE sensorId = :id");
            $req->execute([
                ':id' => $sensorId
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
