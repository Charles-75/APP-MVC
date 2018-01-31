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
            header('Location: /logout');
            return "Please login <a href='/login'>Here</a>";
        }

        header('Location: /myhomes');

    }

    public function contactAction($params) {
        return $this->renderer->renderTemplate('general/contact.php');
    }

    public function faqAction($params) {
        return $this->renderer->renderTemplate('general/faq.php');
    }

    public function cguAction($params) {
        return $this->renderer->renderTemplate('general/cgu.php');
    }

    public function aboutAction($params){
        return $this->renderer->renderTemplate('general/about.php');
    }

    public function newsletterAction($params){
        return $this->renderer->renderTemplate('general/newsletter.php');
    }


    public function memberAction($params) {
        $user = $this->users->getUserById(intval($params['id']));
        return "<pre>".var_dump($user)."</pre>";
    }
}
