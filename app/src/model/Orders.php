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
        $this->bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=app', DB_USER, DB_PASSWORD);
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

    public function deleteOrder($orderId){
        $req = $this->bdd->prepare("DELETE FROM `order` WHERE id = :orderId ");
        $req->execute([
            ':orderId' => $orderId
        ]);
    }
}
