<?php

namespace Src\Controllers;

use \Core\Controller;
use Src\Model\Users;
use Vendors\Renderer\Renderer;

class IndexController extends Controller
{

    private $renderer;
    private $users;

    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->users = new Users();
    }

    public function indexAction($params) {
        // Si l'utilisateur n'est pas connecté
        if(!isset($_SESSION['id']) || !isset($_SESSION['email']) || !isset($_SESSION['password'])) {
            header('Location: /login');
            return "Please login <a href='/login'>Here</a>";
        }

        // Si l'utilisateur a des identifiants en session
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        $user = $this->users->getUserByCredentials($email, $password);

        if($user == null) {
            // Le combo email / mdp stocké en session est faux
            unset($_SESSION['id']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            header('Location: /login');
            return "Please login <a href='/login'>Here</a>";
        }

        header('Location: /myhomes');

    }

    public function contactAction($params) {
        return "<h1>Page de contact</h1> <a href='/about'>Aller à la page about</a>";
    }

    public function memberAction($params) {
        $user = $this->users->getUserById(intval($params['id']));
        return "<pre>".var_dump($user)."</pre>";
    }
}