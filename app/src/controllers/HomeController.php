<?php

namespace Src\Controllers;

use \Core\Controller;
use Src\Model\Homes;
use Src\Model\Sensors;
use Src\Model\Users;
use Src\Model\Rooms;
use Vendors\Renderer\Renderer;

class HomeController extends Controller
{

    private $renderer;
    private $users;
    private $homes;
    private $rooms;
    private $sensors;

    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->users = new Users();
        $this->homes = new Homes();
        $this->rooms = new Rooms();
        $this->sensors = new Sensors();
    }

    public function myHomesAction($params) {
        $data = $this->homes->getUserHomesOrdered($_SESSION['id']);

        return $this->renderer->renderTemplate('home/myhomes.php', $data);
    }

    public function addHomeAction($parmas){
        return $this->renderer->renderTemplate('home/addHome.php');
    }

    public function addHomePostAction($params){
        if (!empty($_POST['town']) && !empty($_POST['street']) && !empty($_POST['number']) && !empty($_POST['zipCode'])){
            if ($_POST['number'] > 1){
                $town = $_POST['town'];
                $street = $_POST['street'];
                $number = $_POST['number'];
                $zipCode = $_POST['zipCode'];
                $idUser = $_SESSION['id'];

                $this->homes->insertHome($town, $street, $number, $zipCode, $idUser);

                header('Location: /myhomes');
            }
            else{
                header('Location: /addhome');
            }
        }
    }

    public function deleteHomeAction($params){
        $apartmentId = $params['id'];
        $this->homes->deleteHome($apartmentId);
        header('Location: /myhomes');
    }

    public function roomsAction($params){
        return $this->renderer->renderTemplate('home/mainPage.php');
    }

    public function homeAction($params){

        $apartmentId = $params['id'];
        $rooms = $this->rooms->getRoomsByHomeId($apartmentId);
        $data = array();
        foreach ($rooms as $room) {
            $sensors = $this->sensors->getSensorsByRooms($room['id']);
            array_push($data, [
               'room' => $room,
               'sensors' => $sensors
            ]);
        }
        return $this->renderer->renderTemplate('home/home.php', $data);

    }
}









