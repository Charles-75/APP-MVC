<?php


namespace Src\Model;


class Notifications
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



    ##########################
    # COMMANDES NOTIFICATION #
    ##########################



    public function addNotification($content, $date){

        $req = $this->bdd->prepare("INSERT INTO notifiaction(content, date) VALUES(:content, :date)");
        $req->execute([
            'content' => $content,
            'date' => $date
        ]);
    }


}