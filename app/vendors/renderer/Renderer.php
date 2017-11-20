<?php

namespace Vendors\Renderer;


class Renderer
{
    /**
     * @param string $template
     * @param array $data
     * @return string
     */
    public function render(string $template, array $data): string {
        return $template;
    }

    /**
     * @param string $path
     * @param array $data
     * @return string
     */
    public function renderTemplate(string $path, array $data): string {
        ob_start();

        require(__DIR__.'/../../src/views/'.$path);
        return ob_get_clean();
    }


    public function __toString()
    {
        return "Renderer";
    }
}