<?php

namespace Src\Controllers;

use \Core\Controller;

class AboutController extends Controller
{
    public function aboutAction() {
        return $this->get('renderer');
    }
}