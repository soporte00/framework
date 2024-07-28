<?php

namespace core;

use core\console;

class _init extends _make
{


    public function index()
    {
        $this->params[0] = 'main';
        $this->layout();
        $this->defaultView();
        $this->logFile();
    }
}
