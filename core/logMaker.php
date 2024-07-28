<?php

namespace core;

class logMaker
{

    use _paths;

    private static $instance = null;

    private function __construct()
    {
    }

    public static function create(){
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function general($log){

        $log = date("d/m/Y H:i:s").'-'.$log.PHP_EOL;

        $file = defined('CONSOLE') ? $this->logFolder. 'log.txt' : '../log/log.txt';

        if($logFile = fopen($file, 'a')){

            fwrite($logFile, $log);
            fclose($logFile);
        }
    }

}
