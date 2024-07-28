<?php

namespace core;

use core\console;
use core\logMaker;

class _log extends console{

    protected $params = false;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function create(){
        logMaker::create()->log($this->params[0]);              
    }

    public function create_dated(){
        logMaker::create()->datedLog($this->params[0]);              
    }
}