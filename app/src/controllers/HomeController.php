<?php

namespace Src\Controllers;

use \Core\Controller;
use Src\Model\Homes;
use Src\Model\Notifications;
use Src\Model\Sensors;
use Src\Model\Users;
use Src\Model\Rooms;
use Src\Model\Cemac;
use Src\Model\Actuators;
use Vendors\Renderer\Renderer;

class HomeController extends Controller
{

    private $renderer;
    private $users;
    private $homes;
    private $rooms;
    private $sensors;
    private $cemac;
    private $actuators;
    private $notifications;

    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->users = new Users();
        $this->homes = new Homes();
        $this->rooms = new Rooms();
        $this->sensors = new Sensors();
        $this->cemac = new Cemac();
        $this->actuators = new Actuators();
        $this->notifications = new Notifications();
    }

    public function myHomesAction($params) {
        $idUser = $_SESSION['id'];
        $homes = $this->homes->getUserHomes($idUser);

        for ($it=0 ; $it < count($homes) ; $it++) {
            $homes[$it]['guest'] = $this->homes->getAllGuests($homes[$it]['id']);
        }
        $data = [
            'homes' => $homes,
        ];
        /*echo "<pre>";
        print_r($data);
        exit();*/
        return $this->renderer->renderTemplate('home/myhomes.php', $data);
    }

    public function addHomeAction($params){
        return $this->renderer->renderTemplate('home/addHome.php');
    }

    public function addHomePostAction($params){
        if (!empty($_POST['town']) && !empty($_POST['street']) && !empty($_POST['number']) && !empty($_POST['zipCode'])){
            if ($_POST['number'] >= 1){
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

    public function addGuestAction($params){
        $apartmentId = $params['id'];
        $data = ['apartmentId' => $apartmentId];
        return $this->renderer->renderTemplate('home/addGuest.php', $data);
    }

    public function addGuestPostAction($params){
        $apartmentId = $params['id'];
        $email = $_POST['email'];
        $user = $this->users->getUserByEmail($email);
        $userId = $user['id'];
        $this->homes->insertGuest($userId, $apartmentId);
        header('Location: /myhomes');
    }

    public function deleteGuestAction($params){
        $apartmentId = $params['id'];
        $guests = $this->homes->getAllGuests($apartmentId);
        $data = [
            'apartmentId' => $apartmentId,
            'guests' => $guests
        ];
        return $this->renderer->renderTemplate('home/deleteGuest.php', $data);
    }

    public function deleteGuestPostAction($params){
        $apartmentId = $params['id'];
        $guests = $this->homes->getAllGuests($apartmentId);   //selectionne les users invités
        foreach ($guests as $guest){
            $cle = $guest['id'];         //id du user
            if (isset($_POST['check'.$cle.''])){
                $guest1 = $this->homes->getGuestId($apartmentId, $cle);    //id de guestship
                foreach ($guest1 as $value){
                    $id = $value['id'];
                    $this->homes->deleteGuest($id);
                }
            }
        }
        header('Location: /myhomes');
    }

    public function deleteHomeAction($params){
        $apartmentId = $params['id'];
        $this->homes->deleteHome($apartmentId);
        $this->homes->deleteAllGuests($apartmentId);
        header('Location: /myhomes');
    }

    public function homeAction($params){
        $apartmentId = $params['id'];
        $_SESSION['apartmentId'] = $apartmentId;
        $homeData = $this->homes->getLatestAverageSensorsData($apartmentId);
        echo "<pre>";
        var_dump($homeData);
        die();
        $data = [
            'apartmentId' => $apartmentId,
            'apartmentData' => $this->rooms->getRoomsByHomeId($apartmentId),
            'dataNotif' => $this->notifications->getNotification(),
            'bigdata'=>$this->sensors->getRoomNameSensorValueSensorType(),
            'sensor_type'=>$this->sensors->getSensorByType(),

        ];

        return $this->renderer->renderTemplate('home/mainPage.php', $data);
    }

    public function addRoomAction($params){
        $apartmentId = $params['id'];
        $data = ['apartmentId' => $apartmentId];
        return $this->renderer->renderTemplate('home/addRoom.php', $data);
    }

    public function addRoomPostAction($params){
        $apartmentId = $params['id'];
        if (!empty($_POST['name'])){
            $name = $_POST['name'];
            $this->rooms->insertRoom($name, $apartmentId);
            header('Location: /home/'.$apartmentId);
        }
        else{
            header('Location: /addroom/'.$apartmentId);
        }
    }
    public function addStuffAction($params){
        $apartmentId = $params['id'];
        $_SESSION['apartmentId'] = $apartmentId;
        $data = [
            'apartmentId' => $apartmentId,
            'apartmentData' => $this->rooms->getRoomIdAndNameByHomeId($apartmentId),
            'cemacData' => $this->cemac->getCemacIdAndNameAndRoomIdByApartmentId($apartmentId),
        ];
        return $this->renderer->renderTemplate('home/addStuff.php', $data);
    }
    public function roomAction($params){
        $apartmentId= $params['id'];
        $_SESSION['apartmentId'] = $apartmentId;
        $roomName = $params['term'];
        $roomId = $this->rooms->getRoomIdByName($roomName);
        $data = [
            'apartmentId' => $apartmentId,
            'sensor' => $this->sensors->getSensorsByRooms($roomId),
            'actuator' => $this ->actuators->getActuatorsByRooms($roomId),
            'roomName' => $roomName
        ];
        return $this -> renderer->renderTemplate( 'home/room.php',$data);
    }
    public function sensorDetailAction($params){
        $apartmentId = $params['id'];

        $data = [
            'apartmentId' => $apartmentId,
        ];
        return $this-> renderer->renderTemplate( 'home/sensordetail.php',$data);
    }
    public function addCemacPostAction($params){
        $apartmentId = $params['id'];
        if (!empty($_POST['reference_cemac']) AND !empty($_POST['piece'])){
            $name = $_POST['reference_cemac'];
            $roomId=$_POST['piece'];
            $this->cemac->addCemac($roomId, $name);
            header('Location: /addstuff/'.$apartmentId);
        }
        else{
            header('Location: /addstuff /'.$apartmentId);
        }
    }
    public function addSensorOrActuatorPostAction($params)
    {
        $apartmentId = $params['id'];
        if (!empty($_POST['type']) AND $_POST['stuff'] == 'sensors' AND !empty($_POST['cemac_id']) AND !empty($_POST['reference'])) {
            $sensorType = $_POST['type'];
            $sensorReference = $_POST['reference'];
            $cemacId = $_POST['cemac_id'];
            $this->sensors->addSensors($sensorType, $sensorReference, $cemacId);
            header('Location: /addstuff/'.$apartmentId);
        }
        if (!empty($_POST['type']) AND ($_POST['stuff'] == 'actuators') AND !empty($_POST['cemac_id']) AND !empty($_POST['reference'])) {
            $actuatorType = $_POST['type'];
            $actuatorReference = $_POST['reference'];
            $cemacId = $_POST['cemac_id'];
            $this->actuators->addActuator($actuatorType, $actuatorReference, $cemacId);
            header('Location: /addstuff/'.$apartmentId);
        } else {
            header('Location: /addstuff/'.$apartmentId);
        }
    }
}









