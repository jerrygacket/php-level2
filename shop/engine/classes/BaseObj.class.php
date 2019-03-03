<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 03.03.19
 * Time: 12:36
 */
class BaseObj
{
    private $logger;
    private $db;
    private $uriVars = [];

    public function __construct($uri = '') {
        $this->logger = Logger::getLogger(LOG_FILE ?? __DIR__ . '/log/logfile.log');
        $this->db = DB::getConnect();
        $this->uriVars = explode('/', $uri);
    }

    public function writeLog($message) {
        $this->logger->writeLog($message);
    }

    public function queryDb($sql, $itemsTable) {
        return $this->db->getAssocResult($sql, $itemsTable);
    }

    public function writeToDb($sql, $itemsTable) {
        return $this->db->writeToDb($sql, $itemsTable);
    }

    public function getPageName() {
        strlen($this->uriVars[1]) ? $pageName = strtolower($this->uriVars[1]) : ($pageName = 'index');

        return $pageName;
    }

    public function getItemIndex() {
        if (isset($this->uriVars[2]) && strlen($this->uriVars[2]) && is_numeric($this->uriVars[2])) {
            return intval($this->uriVars[2]);
        }

        return null;
    }

    private function checkInit() {
        if (!isset($this->logger)) {
            try {
                throw new Exception('Проблеммы с логгером.');
            } catch (Exception $e) {
                echo $e;
                return false;
            }
        }

        if (!isset($this->db) || empty($this->db)) {
            try {
                throw new Exception('Проблеммы с подключением к базе данных.');
            } catch (Exception $e) {
                echo $e;
                return false;
            }
        }

        return true;
    }
}