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
        logMaker::create()->general($this->params[0]);              
    }
}