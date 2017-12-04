<?php

namespace Src\Controllers;

use \Core\Controller;
use Src\Model\Users;
use Vendors\Renderer\Renderer;

class UserController extends Controller
{

    private $renderer;
    private $users;

    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->users = new Users();
        $this->users = new \Src\Model\Users();
    }

    public function loginAction($params) {
        return $this->renderer->renderTemplate('user/login.php');
    }

    public function registerAction($params) {
        return $this->renderer->renderTemplate('user/register.php');
    }

    public function loginpostAction($params) {
        $username = $_POST['username'];
        $user = $this->users->getUserByEmail($username);
        if(sizeof($user) !== null) { // Email existe

        } else { // Email existe pas

        }
    }
}