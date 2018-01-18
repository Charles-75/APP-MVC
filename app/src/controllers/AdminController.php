<?php


namespace Src\Controllers;

use \Core\Controller;
use Src\Model\Homes;
use Src\Model\Admins;
use Src\Model\Notifications;
use Src\Model\Tickets;
use Src\Model\Users;
use Vendors\Renderer\Renderer;


class AdminController extends Controller
{

    private $renderer;
    private $admins;
    private $users;
    private $notification;
    private $homes;
    private $ticket;


    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->admins = new Admins();
        $this->homes = new Homes();
        $this->users = new Users();
        $this->notification = new Notifications();
        $this->ticket = new Tickets();
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
        $data =[
            'dataNotif' => $this->notification->getNotification(),
            'dataTicket' => $this->ticket->getTicketOrderedByUserId()
        ];
        return $this->renderer->renderTemplate('admin/allhomes.php', $data);


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


    public function goToUserHomes($params) {


    }


    public function profileAdminAction($params){
        $data = $this->admins->getAdminById($_SESSION['id']);
        return $this->renderer->renderTemplate('admin/profileAdmin.php', $data);
    }


    public function updateAdminAction($params){
        $data = $this->admins->getAdminById($_SESSION['id']);
        return $this->renderer->renderTemplate('admin/updateAdmin.php', $data);
    }

    public function updateAdminPostAction($params){
        if (!empty($_POST['username']) && !empty($_POST['email'])&& !empty($_POST['phone'])){
            $this->admins->updateAdminById($_POST['username'], $_POST['email'], $_POST['phone'], $_SESSION['id']);
            header('Location: /profileadmin');
        }
    }



    public function notificationForMaintenancePostAction($params){
        if (!empty($_POST['sujet']) && !empty($_POST['contenu'])) {
            $this->notification->addNotification($_POST['sujet'], $_POST['contenu']);
            header('Location: /allhomes');
        }
    }


    public function deleteNotificationAction($params){
        $this->notification->deleteNotification($params['id']);
        header('Location: /allhomes');
    }


    public function getAllTicketsAction($params){
        $data = $this->ticket->getTicketOrderedByUserId();
    }



}