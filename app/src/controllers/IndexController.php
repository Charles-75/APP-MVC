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
        $this->users = new \Src\Model\Users();
    }

    public function indexAction($params) {
        $users = $this->users->getAllUsers();
        $data = [
            'title' => "Hello World",
            'users' => $users,
            'params' => $params
        ];
        return $this->renderer->renderTemplate('index/index.php', $data);
    }

    public function contactAction($params) {
        return "<h1>Page de contact</h1> <a href='/about'>Aller à la page about</a>";
    }

    public function memberAction($params) {
        $user = $this->users->getUserById(intval($params['id']));
        return "<pre>".var_dump($user)."</pre>";
    }
}