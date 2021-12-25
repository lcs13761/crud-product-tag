<?php

namespace Source\Core;

class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . "/../../themes/");
    }
}