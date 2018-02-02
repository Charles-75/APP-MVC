<?php

namespace Src\Model;

use \PDO;

class Cemac
{

    private $bdd;

    /**
     * userstaffstaff constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=app', DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
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

    public function getCemacByRoom($roomId)
    {
        $req = $this->bdd->prepare('SELECT * FROM cemac WHERE roomId = :roomId');
        $req->execute([
            ':roomId' => $roomId
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }

    public function getCemacByApartmentId($apartmentId)
    {
        $req = $this->bdd->prepare('SELECT cemac.* FROM cemac INNER JOIN room ON cemac.roomId = room.id 
                                              WHERE room.apartmentId = :id ');
        $req->execute(
            [':id' => $apartmentId]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }


    public function addCemac($roomId, $name)
    {
        try {
            $req = $this->bdd->prepare("INSERT INTO cemac(name,roomId) VALUES(:name,:roomId)  ");
            $req->execute([
                'name' => $name,
                'roomId' => $roomId,
            ]);

        } catch (\PDOException $e) {
            return null;
        } catch (\Exception $e) {
            return null;
        }

    }

    public function deleteCemac($cemacId){
        try{
            $req = $this->bdd->prepare("DELETE FROM cemac WHERE id = :id");
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

?>