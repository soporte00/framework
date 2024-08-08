<?php

namespace core;

use core\console;

class _init extends _make
{


    public function index()
    {
        $this->logFile();
        $this->params[0] = 'main';
        $this->layout();
        $this->defaultView();
        $this->defaultCss();
        $this->params[0] = 'home';
        $this->vc();
        $this->params[0] = null;
        $this->htaccess();
    }
}
