<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.02.19
 * Time: 20:57
 */

class Logger
{
    private static $logger;

    private $logFile = '';
    private $handler = null;

    private function __construct($fileName = ''){
        $this->logFile = ($fileName == '' ? 'log/logFile.log' : $fileName);
        $this->setLogFile();
    }

    function __destruct() {
        if ($this->handler !== null) {
            fclose($this->handler);
        }
    }

    public static function getLogger($fileName){
        if(Logger::$logger == null){
            Logger::$logger = new Logger($fileName);
        }

        return Logger::$logger;
    }

    private function setLogFile() {
        if ($this->handler !== null) {
            fclose($this->handler);
        }
        $this->handler = fopen($this->logFile, 'a');
    }

    public function writeLog($message) {
        $logTime = date('Y-m-d\TH:i:s');
        $logString = $logTime . ': ' . $message . PHP_EOL;
        if (!fwrite($this->handler, $logString)) {
            return false;
        }

        return true;
    }
}