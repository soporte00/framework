<?php

namespace core;

use core\console;

class _make extends console
{

    private $params = false;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function index()
    {
        return $this->message('Try with: php console make:database | controller | model | view | mvc | test', "warning");
    }

    public function mvc()
    {

        if (!isset($this->params[3])) {
            $this->message('You must espcify a module name, for example', 'error');
            $this->message("~\$php console make:mvc:MyModuleName\n", 'fine');
            return false;
        }

        $this->message('Make -> MVC Modules for: ' . $this->params[3], 'fine');
    }
}
