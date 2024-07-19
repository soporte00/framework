<?php

namespace core;

use core\console;

class _make extends console
{
    use _paths;

    protected $params = false;

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

        if (!isset($this->params[0])) {
            $this->message('You must espcify a module name, for example', 'error');
            $this->message("~\$php console make:mvc MyModuleName\n", 'fine');
            return false;
        }

        $this->model();
        $this->view();
        $this->controller();
    }

    public function vc()
    {

        if (!isset($this->params[0])) {
            $this->message('You must espcify a module name, for example', 'error');
            $this->message("~\$php console make:vc MyModuleName\n", 'fine');
            return false;
        }

        $this->view();
        $this->controller();
    }


    public function apicontroller()
    {

        if (!isset($this->params[0])) {
            $this->message('You must espcify a module name, for example', 'error');
            $this->message("~\$php console make:apicontroller MyModuleName\n", 'fine');
            return false;
        }

        $this->message('Make -> API Controller Module for: ' . $this->params[0], 'fine');

        //make ->  api controller
        _files::file(
            $this->apiControllerFolder . $this->params[0] . 'Controller.php',
            true,
            str_replace('%module%', $this->params[0], file_get_contents('./core/templates/apicontroller.php'))
        );
    }


    public function controller()
    {

        if (!isset($this->params[0])) {
            $this->message('You must espcify a module name, for example', 'error');
            $this->message("~\$php console make:controller MyModuleName\n", 'fine');
            return false;
        }

        $this->message('Make -> Controller Module for: ' . $this->params[0], 'fine');

        //make -> controller
        _files::file(
            $this->controllerFolder . $this->params[0] . 'Controller.php',
            true,
            str_replace('%module%', $this->params[0], file_get_contents('./core/templates/controller.php'))
        );
    }


    public function model()
    {

        if (!isset($this->params[0])) {
            $this->message('You must espcify a module name, for example', 'error');
            $this->message("~\$php console make:model MyModuleName\n", 'fine');
            return false;
        }

        $this->message('Make -> Model Module for: ' . $this->params[0], 'fine');

        //make -> model
        _files::file(
            $this->modelFolder . $this->params[0] . 'Model.php',
            true,
            str_replace(['%module%', '%nspace%'], [$this->params[0], $this->nspace('modelFolder')], file_get_contents('./core/templates/model.php'))
        );
    }

    protected function view()
    {

        if (!isset($this->params[0])) {
            $this->message('You must espcify a module name, for example', 'error');
            $this->message("~\$php console make:view MyModuleName\n", 'fine');
            return false;
        }

        $this->message('Make -> View  for: ' . $this->params[0], 'fine');

        //make -> view
        _files::file(
            $this->viewFolder . $this->params[0] . '/index.php',
            true,
            str_replace('%module%', $this->params[0], file_get_contents('./core/templates/view.php'))
        );

        _files::file(
            $this->jsFolder . $this->params[0] . '/main.js',
            true,
            str_replace('%module%', $this->params[0], file_get_contents('./core/templates/main.js'))
        );

    }

    public function layout()
    {

        if (!isset($this->params[0])) {
            $this->message('You must espcify a layout name, for example', 'error');
            $this->message("~\$php console make:layout MyLayoutName\n", 'fine');
            return false;
        }

        $this->message('Make -> View - Layout: ' . $this->params[0], 'fine');

        //make -> view
        _files::file(
            $this->layoutsFolder .'/'. $this->params[0] . '.php',
            true,
            str_replace('%module%', $this->params[0], file_get_contents('./core/templates/layouts.php'))
        );
    }


    protected function defaultView()
    {

        $this->message('Make -> default View: ' . $this->params[0], 'fine');
        

        $gettingFiles = glob(dirname(__FILE__, 2) . '/core/templates/default/*');
    
    
        foreach ($gettingFiles as $k) {
    
            preg_match('/.*?([a-zA-Z0-9\-_]+\.[a-zA-Z0-9\-_]+)$/', $k, $match);
    
            _files::file(
                $this->viewFolder .'/default/'. $match[1],
                true,
                file_get_contents($k)
            );
        }
    }

}
