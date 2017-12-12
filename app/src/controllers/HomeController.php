<?php

namespace Src\Controllers;

use \Core\Controller;
use Src\Model\Homes;
use Src\Model\Users;
use Vendors\Renderer\Renderer;

class HomeController extends Controller
{

    private $renderer;
    private $users;
    private $homes;

    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->users = new Users();
        $this->homes = new Homes();
    }

    public function myHomesAction($params) {
        $homes = $this->homes->getHomesByUserEmail($_SESSION['id']);
        return $this->renderer->renderTemplate('home/myhomes.php', ['homes' => $homes]);
    }

    public function addHomeAction($parmas){
        return $this->renderer->renderTemplate('home/addHome.php');
    }

    public function addHomePostAction($params){
        if (!empty($_POST['town']) && !empty($_POST['street']) && !empty($_POST['number']) && !empty($_POST['zipCode'])){

                $town = $_POST['town'];
                $street = $_POST['street'];
                $number = $_POST['number'];
                $zipCode = $_POST['zipCode'];
                $idUser = $_SESSION['id'];

                $this->homes->insertHome($town, $street, $number, $zipCode, $idUser);

                $data = ['town' => $town, 'street' => $street, 'number' => $number, 'zipCode' => $zipCode];
                return $this->renderer->renderTemplate('home/myhomes.php', $data);
        }
    }
}









