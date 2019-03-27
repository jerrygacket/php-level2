<?php

class TestModel extends Model {

    public static function run() {
        return self::TestController('GoodsController');
    }

    private static function TestController($TestController) {
        return shell_exec(__DIR__.'/../tests/vendor/bin/phpunit '.__DIR__.'/../tests/'.$TestController.'Test.class.php');
    }

}