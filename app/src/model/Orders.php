<?php

namespace Src\Model;


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


    public function createOrder($content){
        $req = $this->bdd->prepare("INSERT INTO order VALUE(:content)");
        $req->execute([
            ':content' => $content
        ]);
    }


    public function deleteOrder($orderId){
        $req = $this->bdd->prepare("DELETE FROM order WHERE id = :orderId ");
        $req->execute([
            ':orderId' => $orderId
        ]);
    }
}