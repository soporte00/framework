<?php namespace src\models;

use core\dbManager;

class principalModel extends dbManager{

    private int $id;

    public function __construct(){
        parent::__construct();
    }

}