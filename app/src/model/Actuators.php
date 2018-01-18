<?php


namespace Src\Model;

use \PDO;
class Actuators
{
    private $bdd;

    /**
     * Actuators constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    public function getActuatorsByRooms($roomId){
        $req = $this->bdd->prepare("SELECT actuator.* FROM actuator INNER JOIN cemac ON actuator.cemacId = cemac.id
                                              WHERE cemac.roomId = :roomId ");
        $req->execute([
            ':roomId' => $roomId
        ]);

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getActuatorValue($actuatorId){
        $req = $this->bdd->prepare("SELECT value FROM actuator WHERE sensorId = :actuatorId ");
        $req->execute([
            ':actuatorId' => $actuatorId
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function addActuator($actuatorType, $actuatorReference, $cemacId)
    {
        $req = $this->bdd->prepare("INSERT INTO actuator(type,reference,cemacId) VALUES(:type, :reference, :cemacId)");
        $req ->execute([
            ':type' => $actuatorType,
            ':reference' => $actuatorReference,
            ':cemacId' => $cemacId
        ]);
    }

    public function getActuatorByType($actuatorType){
        $req = $this->bdd->prepare("SELECT * FROM actuator WHERE type = :type");
        $req->execute([
            ':type'=>$actuatorType
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function deleteAllActuators($cemacId){
        try{
            $req = $this->bdd->prepare("DELETE FROM actuator WHERE cemacId = :id");
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
}