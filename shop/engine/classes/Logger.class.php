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
            try {
                fclose($this->handler);
            } catch (Exception $e) {
                echo 'error close log file: ' . $e;
            }
        }

        $logDir = dirname($this->logFile);
        if (is_dir($logDir)) {
            try {
                $this->handler = fopen($this->logFile, 'a');
            } catch (Exception $e) {
                echo 'error open log file: ' . $e;
            }
        }
    }

    public function writeLog($message) {
        $logTime = date('Y-m-d\TH:i:s');
        $logString = $logTime . ': ' . $message . PHP_EOL;
        try {
            fwrite($this->handler, $logString);
        } catch (Exception $e) {
            echo 'error write to log file: ' . $e;
            return false;
        }

        return true;
    }
}