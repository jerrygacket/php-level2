<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.02.19
 * Time: 20:00
 */

class DB
{
    private static $db;
    private static $handler;
    private $logger;

    private function __construct(){
        $this->logger = Logger::getLogger(LOG_FILE ?? __DIR__ . '/log/db_connect.log');
        try {
            DB::$handler = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS);
            // настраиваем выбросы эксепшенов для записи в наш лог
            DB::$handler->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch(PDOException $e) {
            $this->logger->writeLog('Проблемы подключения к базе данных: '.$e->getMessage());
        }
    }


    function __destruct() {
        DB::$handler = null;
    }

    public static function getConnect(){
        if(DB::$db==null){
            DB::$db = new DB;
        }
        return DB::$db;
    }

    private function checkTable($table) {
        try {
            $result = DB::$handler->query('DESCRIBE '.$table);
        } catch (Exception $e) {
            return FALSE;
        }

        return $result !== FALSE;
    }

    public function getAssocResult($sql, $table){
        if (!$this->checkTable($table)) {
            return [];
        }

        $sth = DB::$handler->prepare($sql);
        try {
            $sth->execute();
        }
        catch(PDOException $e) {
            $this->logger->writeLog('Ошибка обработки запроса.'.PHP_EOL."\tЗапрос: $sql \n \tОшибка: ".$e->getMessage());
            return [];
        }

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function writeToDb($sql, $table){
        if (!$this->checkTable($table)) {
            return [];
        }

        $sth = DB::$handler->prepare($sql);
        try {
            $sth->execute();
        }
        catch(PDOException $e) {
            $this->logger->writeLog('Ошибка обработки запроса.'.PHP_EOL."\tЗапрос: $sql \n \tОшибка: ".$e->getMessage());
            return false;
        }

        return true;
    }
}