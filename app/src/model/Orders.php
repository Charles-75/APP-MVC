<?php

namespace Src\Model;
use \PDO;

class Orders
{
    private $bdd;

    /**
     * Orders constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=app', DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }



    ####################
    # COMMANDES ORDERS #
    ####################


  
    public function createOrder($title,$roomActionId,$dateStart,$hourStart,$dateEnd,$repetition,$apartmentId)
    {

            $req = $this->bdd->prepare("INSERT INTO `order`(title,roomActionId,dateStart,hourStart,dateEnd,repetition,apartmentId) VALUES(:title,:roomActionId,:dateStart,:hourStart,:dateEnd,:repetition,:apartmentId)");

            $req->execute([
                ':title' => $title,
                ':roomActionId' => $roomActionId,
                ':dateStart' => $dateStart,
                ':hourStart' => $hourStart,
                ':dateEnd' => $dateEnd,
                ':repetition' => $repetition,
                ':apartmentId' => $apartmentId
            ]);


}
     public function  getOrdersByApartmentId($apartmentId){
        $req = $this->bdd->prepare("SELECT * FROM `order` WHERE 	apartmentId= :apartmentId");
        $req->execute(([
            ':apartmentId'=> $apartmentId,
        ]));
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;

    }

    public function deleteOrder($orderId){
        $req = $this->bdd->prepare("DELETE FROM `order` WHERE id = :orderId ");
        $req->execute([
            ':orderId' => $orderId
        ]);
    }
}
