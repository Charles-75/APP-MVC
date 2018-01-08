<?php


namespace Src\Controllers;

use \Core\Controller;
use Src\Model\Homes;
use Src\Model\Admins;
use Src\Model\Users;
use Vendors\Renderer\Renderer;


class AdminController extends Controller
{


    private $renderer;
    private $admins;
    private $users;


    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->admins = new Admins();
        $this->homes = new Homes();
        $this->users = new Users();
    }


    public function loginAction($params) {
        return $this->renderer->renderTemplate('admin/loginAdmin.php');
    }


    public function loginpostAction($params) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->admins->getAdminByCredentials($username, $password);

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
            header('Location: /allhomes');
        }
        else {
            header('Location: /login_admin');
        }
    }

    public function allHomesAction($params) {

        return $this->renderer->renderTemplate('home/allhomes.php');

    }

    public function searchuserAction($params) {
        if(!isset($params['term'])) {
            return json_encode([]);
        }
        $term = $params['term'];
        $users = $this->users->getUserLike($term);
        if($users == null) $users = [];
        return json_encode($users);
    }

}