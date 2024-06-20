<?php

namespace core;

use core\console;

class _make extends console
{
    use _paths;

    private $params = false;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function index()
    {
        return $this->message('Try with: php console make:database | controller | model | mvc | vc | test', "warning");
    }

    public function mvc()
    {

        if (!isset($this->params[2])) {
            $this->message('You must espcify a module name, for example', 'error');
            $this->message("~\$php console make:mvc:MyModuleName\n", 'fine');
            return false;
        }

        $this->message('Make -> MVC Modules for: ' . $this->params[2], 'fine');

        //make -> model
        _files::file(
            $this->modelFolder . $this->params[2] . 'Model.php',
            true,
            str_replace(['%module%', '%nspace%'], [$this->params[2], $this->nspace('modelFolder')], file_get_contents('./core/templates/model.php'))
        );

        //make -> view
        _files::file(
            $this->viewFolder . $this->params[2] . '/index.php',
            true,
            str_replace('%module%', $this->params[2], file_get_contents('./core/templates/view.php'))
        );

        //make -> controller
        _files::file(
            $this->controllerFolder . $this->params[2] . 'Controller.php',
            true,
            str_replace('%module%', $this->params[2], file_get_contents('./core/templates/controller.php'))
        );
    }
}
