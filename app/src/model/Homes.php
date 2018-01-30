<?php

namespace Src\Model;

use \PDO;

class Homes
{

    private $bdd;

    /**
     * Homes constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }



    ###################
    # COMMANDES HOMES #
    ###################



    public function getHomesByUserEmail($email)
    {
        $req = $this->bdd->prepare("
          SELECT apartment.*, (SELECT COUNT(*) FROM room WHERE apartmentId = apartment.id) AS roomsCount FROM apartment
          INNER JOIN user ON apartment.idUser = user.id
          WHERE user.email = :email
        ");
        $req->execute([':email' => $email]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }





    public function getAllHomes()
    {
        try {
            $req = $this->bdd->query("SELECT * FROM apartment");
            return $req->fetchAll(PDO::FETCH_ASSOC); // récupérer que la partie associative
        } catch (\PDOException $e) {
            return [];
        } catch (\Error $e) {
            return [];
        }
    }


    public function getUserHomes($userId){    //Donne les homes d'un user particulier repéré par son id, triée par code postal, et rue.
        try {
            $req = $this->bdd->prepare("SELECT * FROM apartment WHERE idUser = :userId ORDER BY id");  // Pas avec le nom et prénom car 2 clampins peuvent s'appeler pareil...
            $req->execute([':userId' => $userId]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (\PDOException $e) {
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getLatestAverageSensorsData($homeId) {
        $req = $this->bdd->prepare("
          SELECT sensor.typeId, sensortype.name AS typeName, FLOOR(AVG(value.value)) AS averageValue, sensortype.image AS image
          FROM value
          INNER JOIN sensor ON sensor.id = value.sensorId
          INNER JOIN sensortype ON sensortype.id = sensor.typeId
          INNER JOIN cemac ON cemac.id = sensor.cemacId
          INNER JOIN room ON room.id = cemac.roomId
          WHERE value.id IN (
            SELECT MAX(value.id)
              FROM value
              GROUP BY value.sensorId
            )
            AND room.apartmentId = :homeId
          GROUP BY sensor.typeId;
        ");
        $req->execute([
            'homeId' => $homeId
        ]);
        $sensors = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $sensors;
    }


    public function getManagerHomesOrdered($managerId){    //Donne les homes d'un user particulier repéré par son id, triée par code postal, et rue.
        try {
            $req = $this->bdd->prepare("SELECT * FROM apartment ORDER BY zipCode, street WHERE managerId = :managerId");  // Pas avec le nom et prénom car 2 clampins peuvent s'appeler pareil...
            $req->execute([':managerId' => $managerId]);
            $res = $req->fetchALL(PDO::FETCH_ASSOC);
            return $res;
        }
        catch (\PDOException $e) {
            return null;
        }
        catch (\Exception $e){
            return null;
        }
    }

    public function insertHome($town, $street, $number, $zipCode, $idUser){
        try{
            $req = $this->bdd->prepare("INSERT INTO apartment(town, street, number, zipCode, idUser) VALUES(:town, :street, :number, :zipCode, :idUser)");
            $req->execute([
                'town' => $town,
                'street' => $street,
                'number' => $number,
                'zipCode' => $zipCode,
                'idUser' => $idUser,
            ]);
        }
        catch (\PDOException $e){
            return null;
        }
        catch (\Exception $e){
            return null;
        }
    }

    public function insertGuest($userId, $apartmentId){
        try{
            $req = $this->bdd->prepare("INSERT INTO guestship(userId, apartmentId) VALUES(:userId, :apartmentId)");
            $req->execute([
                'userId' => $userId,
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

    public function getAllGuests($apartmentId){
        $req = $this->bdd->prepare("SELECT user.* FROM user INNER JOIN guestship ON guestship.userId = user.id WHERE guestship.apartmentId = :apartmentId");
        $req->execute([
            'apartmentId' => $apartmentId
        ]);

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function deleteHome($id){
        try{
            $req = $this->bdd->prepare("DELETE FROM apartment WHERE id = :id");
            $req->execute([
                'id' => $id
            ]);
        }
        catch (\PDOException $e){
            return null;
        }
        catch (\Exception $e){
            return null;
        }
    }

    public function deleteAllGuests($apartmentId){
        try{
            $req = $this->bdd->prepare("DELETE FROM guestship WHERE apartmentId = :apartmentId");
            $req->execute([
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

    public function getGuestId($apartmentId, $userId){
        $req = $this->bdd->prepare("SELECT id FROM guestship WHERE guestship.apartmentId = :apartmentId AND guestship.userId = :userId");
        $req->execute([
            'apartmentId' => $apartmentId,
            'userId' => $userId
        ]);

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getGuestApartmentsId($userId){
        $req = $this->bdd->prepare("SELECT apartmentId FROM guestship WHERE userId = :userId");
        $req->execute([
            'userId' => $userId
        ]);

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function deleteGuest($id){
        try{
            $req = $this->bdd->prepare("DELETE FROM guestship WHERE id = :id");
            $req->execute([
                'id' => $id,
            ]);
        }
        catch (\PDOException $e){
            return null;
        }
        catch (\Exception $e){
            return null;
        }
    }

    public function getApartmentByApartmentId($apartmentId){
        try {
            $req = $this->bdd->prepare("SELECT * FROM apartment WHERE id = :apartmentId ORDER BY id");
            $req->execute([':apartmentId' => $apartmentId]);
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (\PDOException $e) {
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }



    /*public function getHomesByUserId($userId){
        $req = $this->bdd->prepare("SELECT room.* FROM apartment INNER JOIN apartement
                                              WHERE apartment.id = room.apartmentId WHERE apartent.idUser = :userId");
        $req->execute([
            ':userId' => $userId
        ]);

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }*/

}



