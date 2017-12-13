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

    public function loginpostAction($params) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->users->getUserByCredentials($username, $password);
        if($user !== null) { // Email existe
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['id'] = $user['id'];
            header('Location: /myhomes');
        } else {
            header('Location: /login');
        }
    }

    public function registerAction($params) {
        return $this->renderer->renderTemplate('user/register.php');
    }

    public function registerpostAction($params){
        if (!empty($_POST['firstname']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmation']) && !empty($_POST['phone'])){
            if ($_POST['password'] == $_POST['confirmation']){

                $firstname = $_POST['firstname'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phone = $_POST['phone'];

                $this->users->insertUser($firstname, $surname, $email, $password, $phone);
                return '<p>Votre inscription à été accepté, vous pouvez dorénavant vous connecter en cliquant ci-dessous :</p><p><a href="/login">Se connecter</a></p>';
            }
            else{
                return '<p>Veuillez confirmer correctement votre mot de passe</p>';
            }
        }
        else{
            return '<p>Vous devez remplir tous les champs du formulaire</p>';
        }
    }

    public function logoutAction($params) {
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('Location: /login');
    }
}