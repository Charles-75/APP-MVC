<?php
namespace Vendors\Container;


class Container
{

    private $dependencies = [];

    public function __construct(array $dependencies = [])
    {
        $this->dependencies = $dependencies;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function get(string $name)
    {
        if(!isset($this->dependencies[$name])) {
            throw new Error('Could not find requested dependencies');
        }
        else {
            return $this->dependencies[$name];
        }
    }

    /**
     * @param string $name
     * @param mixed $dependencie
     */
    public function add(string $name, $dependencie)
    {
        $this->dependencies[$name] = $dependencie;
    }
}