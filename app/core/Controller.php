<?php

namespace Core;

use Vendors\Container\Container;
use Vendors\Renderer\Renderer;

class Controller
{

    /**
     * @var array
     */
    static $dependencies = [
        'renderer' => Renderer::class
    ];

    /**
     * @var Container
     */
    private $container;

    /**
     * Controller constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return mixed
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name)
    {
        return $this->container->get($name);
    }

}