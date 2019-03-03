<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.02.19
 * Time: 20:00
 */

class DB
{
    use DBFuncs;

    private static $db;
    private static $handler;

    private function __construct(){
        DB::$handler = mysqli_connect(HOST, USER, PASS, DB);
    }


    function __destruct() {
        mysqli_close(DB::$handler);
    }

    public static function getConnect(){
        if(DB::$db==null){
            DB::$db = new DB;
        }
        return DB::$db;
    }
}