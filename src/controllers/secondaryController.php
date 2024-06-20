<?php

use core\render;

final class secondaryController{

    public function index(){
        render::view('secondary/index.php',['controllerName'=>'secondary']);
    }
}