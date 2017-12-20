<?php

namespace Src\Controllers;

use \Core\Controller;
use Src\Model\Homes;
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
        $this->homes = new Homes();
    }

    public function loginAction($params) {
        return $this->renderer->renderTemplate('user/login.php');
    }

    /**
     * @param $params
     */
    public function loginpostAction($params) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->users->getUserByCredentials($username, $password);

        if($user !== null) { // Email existe
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['id'] = $user['id'];
            if (isset($_POST['rememberMe'])){
                setcookie('email', $_SESSION['email'], time() + 365*24*3600);
                setcookie('password', $_SESSION['password'], time() + 365*24*3600);
                setcookie('checked', 'checked', time() + 365*24*3600);
            }
            else{
                setcookie('checked', '', time() + 1);
                setcookie('email', $_SESSION['email'], time() + 1);
                setcookie('password', $_SESSION['password'], time() + 1);
            }
            header('Location: /myhomes');
        }
        else {
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
                header('Location: /login');
            }
            else{
                header('Location: /register');
                //return '<p>Veuillez confirmer correctement votre mot de passe</p>';
            }
        }
        else{
            header('Location: /register');
            //return '<p>Vous devez remplir tous les champs du formulaire</p>';
        }
    }

    public function logoutAction($params) {
        unset($_SESSION['id']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['apartmentId']);
        header('Location: /login');
    }

    public function profileAction($params){
        $data = $this->users->getUserById($_SESSION['id']);
        return $this->renderer->renderTemplate('user/profile.php', $data);
    }

    public function updateProfileAction($params){
        $data = $this->users->getUserById($_SESSION['id']);
        return $this->renderer->renderTemplate('user/updateprofile.php', $data);
    }

    public function updateProfilePostAction($params){
        if (!empty($_POST['firstname']) && !empty($_POST['surname']) && !empty($_POST['email'])&& !empty($_POST['phone'])){

            $this->users->updateUserById($_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['phone'], $_SESSION['id']);
            header('Location: /profile');
        }
    }
}