<?php


namespace Src\Controllers;


use Src\Model\Sensors;
use Vendors\Renderer\Renderer;

class SensorController
{

    private $renderer;
    private $sensor;



    public function __construct()
    {
        $this->renderer = new Renderer();
        $this->sensor = new  Sensors();

    }






}