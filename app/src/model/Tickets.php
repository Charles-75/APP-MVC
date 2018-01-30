<?php


namespace Src\Model;

use \PDO;

class Tickets
{
    private $bdd;

    /**
     * Ticket constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=app', DB_USER, DB_PASSWORD);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    #####################
    # COMMANDES TICKETS #
    #####################



    public function createNewTicket($subject, $content, $userId) {    //Prendre la date actuelle dans le controller quand on appelle cette fonction
                                                                  //Et la mettre dans creationDate
        $req = $this->bdd->prepare("INSERT INTO ticket (creationDate, closeDate, state, subject, content, userId) VALUE(NOW(), :closeDate, :state, :subject, :content, :userId)");
        $req->execute([
            ':closeDate' => null,
            ':state' => 0,
            ':subject' => $subject,
            ':content' => $content,
            ':userId' => $userId
        ]);
    }

    public function closeTicket($tickedId, $closeDate){   //C'est juste un UPDATE avec le state qui change

        //Mettre la date actuelle dans $closeDate dans le controller

        $req = $this->bdd->prepare("UPDATE ticket SET closeDate = :closeDate state = :state WHERE id = :tickedId");
        $req->execute([
            ':closeDate' => $closeDate,
            ':state' => 1,
            ':tickedId' => $tickedId
        ]);
    }


    public function getTicketOrderedByUserId(){
        $req = $this->bdd->query("SELECT * FROM ticket ORDER BY userId");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getTicket($id){
        $req = $this->bdd->prepare("SELECT * FROM ticket WHERE id = :id");
        $req->execute([
            'id' => $id
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getAllTicketsClosed($userId){
        $req = $this->bdd->prepare("SELECT * FROM ticket WHERE userId = :id AND closeDate IS NOT NULL ORDER BY creationDate DESC ");
        $req->execute([
            'id' => $userId
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getAllTicketsStillOpen($userId){
        $req = $this->bdd->prepare("SELECT * FROM ticket WHERE userId = :id AND closeDate IS NULL ORDER BY creationDate DESC");
        $req->execute([
            'id' => $userId
        ]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getAllTicketsStillOpenAdmin(){
        $req = $this->bdd->query("SELECT * FROM ticket WHERE closeDate IS NULL ORDER BY creationDate DESC");

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getAllTicketsClosedAdmin(){
        $req = $this->bdd->query("SELECT * FROM ticket WHERE closeDate IS NOT NULL ORDER BY creationDate DESC ");

        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }



}