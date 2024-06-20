<?php

use core\render;

final class thirdController{

    public function index(){
        render::view('third/index.php',['controllerName'=>'third']);
    }
}