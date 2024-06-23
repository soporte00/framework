<?php

use core\render;

final class %module%Controller
{

    public function index()
    {
        render::view('%module%/index.php', ['controllerName' => '%module%']);
    }
}
