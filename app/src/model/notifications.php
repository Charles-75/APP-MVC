<?php


namespace Src\Model;

use \PDO;


class Notifications
{


    private $bdd;

    /**
     * Homes constructor.
     */
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=app', DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }



    ##########################
    # COMMANDES NOTIFICATION #
    ##########################



    public function addNotification($subject, $content){

        $req = $this->bdd->prepare("INSERT INTO notification(subject, content, date) VALUES(:subject, :content, NOW())");
        $req->execute([
            'subject' => $subject,
            'content' => $content,
        ]);

    }


    public function getNotification(){
        $req = $this->bdd->query("SELECT * FROM notification");
        $res = $req->fetchALL(PDO::FETCH_ASSOC);


        return $res;
    }


    public function deleteNotification($id){
        $req = $this->bdd->prepare("DELETE FROM notification WHERE id = :id");
        $req->execute([
            "id" => $id
        ]);
    }


}