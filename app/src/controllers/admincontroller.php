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
        return $this->renderer->renderTemplateAdmin('admin/loginAdmin.php');
    }


    public function loginpostAction($params) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->admins->getAdminByCredentials($username, $password);

        if($user !== null) { // Email existe
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['adminId'] = $user['id'];
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

    public function logoutAction($params){
        unset($_SESSION['adminId']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['apartmentId']);
        header('Location: /login_admin');
    }

    public function allHomesAction($params) {
        $data =[
            'dataNotif' => $this->notification->getNotification(),
            'dataTicket' => $this->ticket->getTicketOrderedByUserId()
        ];
        return $this->renderer->renderTemplateAdmin('admin/allhomes.php', $data);


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
        unset($_SESSION['warning']);
        $admin = $this->admins->getAdminById($_SESSION['adminId']);
        $password = substr($admin['password'], 0, 3);
        $data = [
          'admin' => $admin,
          'password' => $password
        ];
        return $this->renderer->renderTemplateAdmin('admin/profileAdmin.php', $data);
    }


    public function updateAdminAction($params){
        $data = $this->admins->getAdminById($_SESSION['adminId']);
        return $this->renderer->renderTemplateAdmin('admin/updateAdmin.php', $data);
    }

    public function updateAdminPostAction($params){
        if (!empty($_POST['username']) && !empty($_POST['email'])&& !empty($_POST['phone'])){
            $this->admins->updateAdminById($_POST['username'], $_POST['email'], $_POST['phone'], $_SESSION['adminId']);
            header('Location: /profileadmin');
        }
    }

    public function changePasswordAction($params){
        return $this->renderer->renderTemplateAdmin('admin/changePasswordAdmin.php');
    }

    public function changePasswordPostAction($params){
        $admin = $this->admins->getAdminById($_SESSION['adminId']);
        if ($admin['password'] == hash('sha256', $_POST['password'])){
            if (strlen($_POST['password1']) > 6){
                if ($_POST['password1'] == $_POST['password2']){
                    $this->admins->updateAdminPasswordById($_POST['password1'], $_SESSION['adminId']);
                    $_SESSION['password'] = hash('sha256', $_POST['password1']);
                    header('Location: /profileadmin');
                }
                else{
                    header('Location: /changepassword');
                    $_SESSION['warning'] = "Veuillez reconfirmer votre mot de passe";
                }
            }
            else{
                header('Location: /changepassword');
                $_SESSION['warning'] = "Votre mot de passe doit faire au moins sept caractères";
            }
        }
        else{
            header('Location: /changepassword');
            $_SESSION['warning'] = "Votre mot de passe actuel est incorrect";
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



    public function ticketAdminAction($params)
    {
        $ticketsOpen = $this->ticket->getAllTicketsStillOpenAdmin();
        $ticketsClose = $this->ticket->getAllTicketsClosedAdmin();
        $months = ["janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre"];

        for ($it = 0; $it < count($ticketsOpen); $it++) {
            $obj = new \DateTime($ticketsOpen[$it]['creationDate']);
            $date0 = $obj->format('d');
            $month1 = $obj->format('m');
            $month = $months[$month1 - 1];
            $date3 = $obj->format('Y à H');
            $date2 = $obj->format('i');
            $date = $date0 . " " . $month . " " . $date3 . "h" . $date2;
            $ticketsOpen[$it]['openDate'] = $date;
        }
        for ($it = 0; $it < count($ticketsClose); $it++) {
            $obj1 = new \DateTime($ticketsClose[$it]['creationDate']);
            $date4 = $obj1->format('d');
            $month2 = $obj1->format('m');
            $month3 = $months[$month2 - 1];
            $date5 = $obj1->format('Y à H');
            $date6 = $obj1->format('i');
            $date1 = $date4 . " " . $month3 . " " . $date5 . "h" . $date6;
            $ticketsClose[$it]['openDate'] = $date1;

            $obj2 = new \DateTime($ticketsClose[$it]['closeDate']);
            $date7 = $obj2->format('d');
            $month4 = $obj2->format('m');
            $month5 = $months[$month4 - 1];
            $date8 = $obj2->format('Y à H');
            $date9 = $obj2->format('i');
            $closeDate = $date7 . " " . $month5 . " " . $date8 . "h" . $date9;
            $ticketsClose[$it]['closeDate'] = $closeDate;
        }
        $data = [
            'ticketsOpen' => $ticketsOpen,
            'ticketsClose' => $ticketsClose,
        ];
        return $this->renderer->renderTemplateAdmin('templates/admin/ticketadmin.php', $data);
    }

    public function viewTicketAdminAction($params){
        $ticketId = $params['id'];
        $ticket = $this->ticket->getTicket($ticketId);
        $months = ["janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
        foreach ($ticket as $value){
            $obj = new \DateTime($value['creationDate']);
            $date0 = $obj->format('d');
            $month1 = $obj->format('m');
            $month = $months[$month1 - 1];
            $date1 = $obj->format('Y à H');
            $date2 = $obj->format('i');
            $date = $date0." ".$month." ".$date1."h".$date2;
            if ($value['closeDate'] != NULL){
                $obj1 = new \DateTime($value['closeDate']);
                $date3 = $obj1->format('d');
                $month2 = $obj1->format('m');
                $month1 = $months[$month2 - 1];
                $date4 = $obj1->format('Y à H');
                $date5 = $obj1->format('i');
                $closeDate = $date3." ".$month1." ".$date4."h".$date5;
                //test
            }
        }
        if (isset($closeDate)){
            $data = [
                'ticket' => $ticket,
                'date' => $date,
                'closeDate' => $closeDate
            ];
        }
        else{
            $data = [
                'ticket' => $ticket,
                'date' => $date
            ];
        }
        return $this->renderer->renderTemplateAdmin('templates/admin/viewticketadmin.php', $data);
    }


}