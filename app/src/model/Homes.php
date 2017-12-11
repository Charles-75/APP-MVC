<?php

namespace Src\Model;

use \PDO;

class Homes
{

    private $bdd;

    /**
     * Manager constructor.
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

<<<<<<< HEAD
    public function getRoomsByHomeId($homeId) {
        $req = $this->bdd->prepare("SELECT * FROM room WHERE apartmentId = :id");
        $req->execute([':id' => $homeId]);
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
=======
>>>>>>> 02a27725a79b1248d68fc2fe9aaa9c185e6bbdab



        public
        function getAllHomes()
        {
            try {
                $req = $this->bdd->query("SELECT * FROM user");
                return $req->fetchAll(PDO::FETCH_ASSOC); // récupérer que la partie associative
            } catch (\PDOException $e) {
                return [];
            } catch (\Error $e) {
                return [];
            }
        }


        public function getUserHomesOrdered($userId){    //Donne les homes d'un user particulier repéré par son id, triée par code postal, et rue.
            try {
                $req = $this->bdd->prepare("SELECT * FROM apartment ORDER BY zipCode, street WHERE userId = :userId");  // Pas avec le nom et prénom car 2 clampins peuvent s'appeler pareil...
                $req->execute([':userId' => $userId]);
                $res = $req->fetchALL(PDO::FETCH_ASSOC);
                return $res;
            } catch (\PDOException $e) {
                return null;
            } catch (\Exception $e) {
                return null;
            }
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

}
