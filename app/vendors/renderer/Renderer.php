<?php

namespace Vendors\Renderer;


class Renderer
{
    /**
     * @param string $template
     * @param array $variables
     * @return string
     */
    public function render(string $template, array $variables): string {
        return $template;
    }


    public function __toString()
    {
        return "Renderer";
    }
}