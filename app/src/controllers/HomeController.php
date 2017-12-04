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

    public function myhomesAction($params) {
        $homes = $this->homes->getHomesByUserEmail($_SESSION['email']);
        return $this->renderer->renderTemplate('home/myhomes.php', ['homes' => $homes]);
    }
}