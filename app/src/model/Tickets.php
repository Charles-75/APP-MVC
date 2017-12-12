<?php


namespace Src\Model;


class Ticket
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



    public function createNewTicket($creationDate, $content) {    //Prendre la date actuelle dans le controller quand on appelle cette fonction
                                                                  //Et la mettre dans creationDate

        $req = $this->bdd->prepare("INSERT INTO ticket VALUE(:creationDate, :closeDate, :state, :content)");
        $req->execute([
            ':creationDate' => $creationDate,
            ':closeDate' => null,
            ':state' => 0,
            ':content' => $content
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

}