<?php

namespace Src\Controllers;

use \Core\Controller;
use Src\Model\Tickets;
use Src\Model\Users;
use Vendors\Renderer\Renderer;

class UserController extends Controller
{

    private $renderer;
    private $users;
    private $tickets;

    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->users = new Users();
        $this->tickets = new Tickets();
    }

    public function loginAction($params) {
        unset($_SESSION['warning']);
        return $this->renderer->renderTemplate('user/login.php');
    }

    /**
     * @param $params
     */
    public function loginpostAction($params) {
        unset($_SESSION['info']);
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
        unset($_SESSION['info']);
        return $this->renderer->renderTemplate('user/register.php');
    }

    public function registerpostAction($params){
        if (!empty($_POST['firstname']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmation']) && !empty($_POST['phone'])){
            if ($_POST['password'] == $_POST['confirmation']){
                if (isset($_POST['cgu'])){
                    $firstname = $_POST['firstname'];
                    $surname = $_POST['surname'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $phone = $_POST['phone'];

                    $this->users->insertUser($firstname, $surname, $email, $password, $phone);
                    $_SESSION['info'] = "Votre inscription a bien été prise en compte, vous pouvez maintenant vous connecter";
                    header('Location: /login');
                }
                else{
                    header('Location: /register');
                    $_SESSION['warning'] = "Vous devez accepter les conditions générales d'utilisation (CGU)";
                }
            }
            else{
                header('Location: /register');
                $_SESSION['warning'] = "Revérifiez la confirmation de votre mot de passe";
            }
        }
        else{
            header('Location: /register');
            $_SESSION['warning'] = "Vous devez remplir tous les champs du formulaire";
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

    public function addTicketAction($params){
        return $this->renderer->renderTemplate('user/addticket.php');
    }

    public function addTicketPostAction($params){
        $userId = $_SESSION['id'];
        $content = $_POST['content'];
        $subject = $_POST['subject'];
        $this->tickets->createNewTicket($subject, $content, $userId);
        header('Location: /tickethistoric');
    }

    public function ticketHistoricAction($params){
        $userId = $_SESSION['id'];
        $ticketsOpen = $this->tickets->getAllTicketsStillOpen($userId);
        $ticketsClose = $this->tickets->getAllTicketsClosed($userId);
        $months = ["janvier", "février", "mars", "avril", "mai", "juin",
            "juillet", "août", "septembre", "octobre", "novembre", "décembre"];

        for ($it = 0; $it < count($ticketsOpen); $it++){
            $obj = new \DateTime($ticketsOpen[$it]['creationDate']);
            $date0 = $obj->format('d');
            $month1 = $obj->format('m');
            $month = $months[$month1 - 1];
            $date3 = $obj->format('Y à H');
            $date2 = $obj->format('i');
            $date = $date0." ".$month." ".$date3."h".$date2;
            $ticketsOpen[$it]['openDate'] = $date;
        }
        for ($it = 0; $it < count($ticketsClose); $it++){
            $obj1 = new \DateTime($ticketsClose[$it]['creationDate']);
            $date4 = $obj1->format('d');
            $month2 = $obj1->format('m');
            $month3 = $months[$month2 - 1];
            $date5 = $obj1->format('Y à H');
            $date6 = $obj1->format('i');
            $date1 = $date4." ".$month3." ".$date5."h".$date6;
            $ticketsClose[$it]['openDate'] = $date1;

            $obj2 = new \DateTime($ticketsClose[$it]['closeDate']);
            $date7 = $obj2->format('d');
            $month4 = $obj2->format('m');
            $month5 = $months[$month4 - 1];
            $date8 = $obj2->format('Y à H');
            $date9 = $obj2->format('i');
            $closeDate = $date7." ".$month5." ".$date8."h".$date9;
            $ticketsClose[$it]['closeDate'] = $closeDate;
        }
        $data = [
            'ticketsOpen' => $ticketsOpen,
            'ticketsClose' => $ticketsClose,
        ];
        return $this->renderer->renderTemplate('user/ticketHistoric.php', $data);
    }
    public function viewTicketAction($params){
        $ticketId = $params['id'];
        $ticket = $this->tickets->getTicket($ticketId);
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
        return $this->renderer->renderTemplate('user/viewTicket.php', $data);
    }
}