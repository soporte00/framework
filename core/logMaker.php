<?php

namespace core;

class logMaker
{

    use _paths;

    private static $instance = null;
    private $file = null;
    private $datedFile = null;

    private function __construct()
    {
        $this->file = defined('CONSOLE') ? $this->logFolder . 'log.txt' : '.'.$this->logFolder.'/log.txt';
        $this->datedFile = defined('CONSOLE') ? $this->logFolder .'/datedLogs/'. date("Y-m-d") . '.txt' : '.'.$this->logFolder.'/datedLogs/' . date("Y-m-d") . '.txt';
    }


    public static function create()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function log($log)
    {

        $log = date("d/m/Y H:i:s") . '-' . $log . PHP_EOL;

        if ($logFile = fopen($this->file, 'a')) {

            fwrite($logFile, $log);
            fclose($logFile);
        }
    }

    public function datedLog($log)
    {
        $log = date("d/m/Y H:i:s") . '-' . $log . PHP_EOL;

        if ($logFile = fopen($this->datedFile, 'a')) {

            fwrite($logFile, $log);
            fclose($logFile);
        }
    }
}
