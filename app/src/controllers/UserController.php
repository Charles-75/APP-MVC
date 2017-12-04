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
    }

    public function loginAction($params) {
        return $this->renderer->renderTemplate('user/login.php');
    }

    public function registerAction($params) {
        return $this->renderer->renderTemplate('user/register.php');
    }

    public function loginpostAction($params) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->users->getUserByCredentials($username, $password);
        if($user !== null) { // Email existe
            $_SESSION['username'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            header('Location: /homes');
        } else {
            header('Location: /login');
        }
    }
}