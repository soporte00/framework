<?php namespace core;

trait _paths{

    public $controllerFolder = "./src/controllers/";
    public $apiControllerFolder = "./src/api_controllers/";
    public $modelFolder = "./src/models/";
    public $viewFolder = "./src/views/";
    public $configFolder = "./config/";
    public $htaccessFile = "./.htaccess";
    public $databaseFolder = "./database/";
    public $uploadFolder = "./public/assets/upload/";
    public $unitTestFolder = "./test/";
    public $jsFolder = "./public/assets/js/";

    public function nspace(string $path): string
    {
        preg_match('/^\.\/([a-zA-Z.\/]+)\/$/', $this->$path, $match);
        $path = str_replace('/', '\\', $match[1]);
        return $path;
    }
}