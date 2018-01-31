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
use Src\Model\Orders;
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
    private $orders;

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
        $this->orders = new Orders();
    }

    public function myHomesAction($params) {
        $idUser = $_SESSION['id'];
        $homes = $this->homes->getUserHomes($idUser);
        $homesGuests = $this->homes->getGuestApartmentsId($idUser);
        for ($it=0 ; $it < count($homes) ; $it++) {
            $homes[$it]['guest'] = $this->homes->getAllGuests($homes[$it]['id']);
        }
        for ($it=0; $it < count($homesGuests); $it++){
            $apartmentId = $homesGuests[$it]['apartmentId'];
            $homesGuests[$it]['guest'] = $this->homes->getApartmentByApartmentId($apartmentId);
        }
        $data = [
            'homes' => $homes,
            'homesGuests' => $homesGuests
        ];
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
                header('Location: /addhome/');
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

        $data = [
            'apartmentId' => $apartmentId, // Pour le header
            'sensorsData' => $this->homes->getLatestAverageSensorsData($apartmentId), // Colonne de gauche
            'rooms' => $this->rooms->getRoomsByHomeId($apartmentId),
            'dataNotif' => $this->notifications->getNotification(),
             'order' => $this->orders->getOrdersByApartmentId($apartmentId),
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
            $this->rooms->addRoom($name, $apartmentId);
            header('Location: /home/'.$apartmentId);
        }
        else{
            header('Location: /addroom/'.$apartmentId);
        }
    }

    public function deleteRoomAction($params){
        $apartmentId = $params['id'];
        $rooms = $this->rooms->getRoomIdAndNameByHomeId($apartmentId);
        $data = [
            'apartmentId' => $apartmentId,
            'rooms' => $rooms
        ];
        return $this->renderer->renderTemplate('home/deleteRoom.php', $data);
    }

    public function deleteRoomPostAction($params){
        $apartmentId = $params['id'];
        $rooms = $this->rooms->getRoomIdAndNameByHomeId($apartmentId);
        foreach ($rooms as $room){
            $id = $room['id'];
            if (isset($_POST['check'.$id.''])){
                $this->rooms->deleteRoom($id);
            }
        }
        header('Location: /home/'.$apartmentId);

    }

    public function addStuffAction($params){
        $apartmentId = $params['id'];
        $_SESSION['apartmentId'] = $apartmentId;
        $data = [
            'apartmentId' => $apartmentId,
            'apartmentData' => $this->rooms->getRoomIdAndNameByHomeId($apartmentId),
            'cemacData' => $this->cemac->getCemacByApartmentId($apartmentId),
            'sensorTypes' => $this->sensors->getAllSensorTypes()
        ];
        return $this->renderer->renderTemplate('home/addStuff.php', $data);
    }
    public function roomAction($params){
        $roomId = $params['id'];
        //$roomId = $this->rooms->getRoomIdByName($roomName);
        $data = [
            'sensor' => $this->sensors->getSensorsByRooms($roomId),
            'actuator' => $this ->actuators->getActuatorsByRooms($roomId),
            'roomId' => $roomId
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
            header('Location: /addgear/'.$apartmentId);
        }
        else{
            header('Location: /addgear/'.$apartmentId);
        }
    }
    public function addSensorOrActuatorPostAction($params)
    {
        $apartmentId = $params['id'];
        if (!empty($_POST['Id']) AND $_POST['stuff'] == 'sensors' AND !empty($_POST['cemac_id']) AND !empty($_POST['reference'])) {
            $sensorType = $_POST['typeId'];
            $sensorReference = $_POST['reference'];
            $cemacId = $_POST['cemac_id'];
            $this->sensors->addSensors($sensorType, $sensorReference, $cemacId);
            header('Location: /addgear/'.$apartmentId);
        }
        if (!empty($_POST['typeId']) AND ($_POST['stuff'] == 'actuators') AND !empty($_POST['cemac_id']) AND !empty($_POST['reference'])) {
            $actuatorType = $_POST['typeId'];
            $actuatorReference = $_POST['reference'];
            $cemacId = $_POST['cemac_id'];
            $this->actuators->addActuator($actuatorType, $actuatorReference, $cemacId);
            header('Location: /addgear/'.$apartmentId);
        } else {
            header('Location: /addgear/'.$apartmentId);
        }
    }
     public function orderAction($params){
    $apartmentId=$params['id'];
    $data=[
        'apartmentId' => $apartmentId,
        'room' => $this->rooms->getRoomIdAndNameByHomeId($apartmentId),
    ];
    return $this->renderer->renderTemplate('home/order.php',$data);
}
    public function orderPostAction($params){
        $apartmentId = $params['id'];
        if (!empty($_POST['title'])){
            $title = $_POST['title'];
            $dateStart = $_POST['dateStart'];
            $hourStart = $_POST['hourStart'];
            $dateEnd = $_POST['dateEnd'];
            $repetition= $_POST['day'];
            $roomActionId = $_POST['roomActionId'];

            $this->orders->createOrder($title,$roomActionId,$dateStart,$hourStart,$dateEnd,$repetition,$apartmentId);
            header( 'Location: /order/'.$apartmentId);
        }
        else {
            header('Location: /order/'.$apartmentId);
        }

    }
    public function deleteCemacAction($params){
        $apartmentId = $params['id'];
        $rooms = $this->rooms->getRoomIdAndNameByHomeId($apartmentId);
        $cemacs = $this->cemac->getCemacByApartmentId($apartmentId);
        $data = [
            'apartmentId' => $apartmentId,
            'rooms' => $rooms,
            'cemacs' => $cemacs
        ];
        return $this->renderer->renderTemplate('home/deleteCemac.php', $data);
    }

    public function deleteCemacPostAction($params){
        $apartmentId = $params['id'];
        $cemacs = $this->cemac->getCemacByApartmentId($apartmentId);
        foreach ($cemacs as $cemac){
            $cemacId = $cemac['id'];
            if (isset($_POST['check'.$cemacId.''])){
                $this->cemac->deleteCemac($cemacId);
                $this->sensors->deleteAllSensors($cemacId);
                $this->actuators->deleteAllActuators($cemacId);
            }
        }
        header('Location: /home/'.$apartmentId);
    }
    public function deleteOrderAction($orderId){
        $apartmentId = $params['id'];
        $this->orders->deleteOrder($orderId);
        header('Location:'home/'.$apartmentId); 


}









