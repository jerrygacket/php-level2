<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 27.02.19
 * Time: 20:02
 */
trait DBFuncs {
    function sanitizeSQL($sql) {
        $result = mysqli_real_escape_string(DB::$handler, (string)htmlspecialchars(strip_tags($sql)));

        return $result;
    }

    function executeSafeQuery($sql) {
        $result = mysqli_query(DB::$handler, $sql);

        return $result;
    }

    function executeQuery($sql) {
        $sql = $this->sanitizeSQL($sql);
        $result = mysqli_query(DB::$handler, $sql);

        return $result;
    }

    function getDBError() {
        return mysqli_error(DB::$handler);
    }

    function getAssocResult($sql){
        $result = $this->executeQuery($sql);
        if(is_bool($result)) {
            return [];
        }
        $array_result = array();
        while($row = mysqli_fetch_assoc($result))
            $array_result[] = $row;

        return $array_result;
    }

    function getTableRow($sql) {
        $array_result = DB::getAssocResult($sql);
        $result = ($array_result[0] ?? []);

        return $result;
    }

    function sanitizeArray(&$item){
        $result = mysqli_real_escape_string(DB::$handler, (string)htmlspecialchars(strip_tags($item)));

        return $result;
    }
}