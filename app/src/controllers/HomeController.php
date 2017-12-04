<?php

namespace Src\Controllers;

use \Core\Controller;
use Src\Model\Users;
use Vendors\Renderer\Renderer;

class HomeController extends Controller
{

    private $renderer;
    private $users;

    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->users = new Users();
    }

    public function myhomesAction($params) {
        $data = $_SESSION;
        return $this->renderer->renderTemplate('home/myhomes.php', $data);
    }
}