<?php

class Tests extends Model {

    public static function run() {
        $testResult['GoodsController'] = str_replace("\n", '<br>', self::TestController('GoodsController'));
        $testResult['GoodView'] = str_replace("\n", '<br>', self::TestView('GoodView'));

        return $testResult;
    }

    private static function TestController($TestController) {
        return shell_exec(__DIR__.'/../tests/vendor/bin/phpunit '.__DIR__.'/../tests/'.$TestController.'Test.class.php');
    }

    private static function TestView($TestView) {
        return shell_exec(__DIR__.'/../tests/vendor/bin/phpunit '.__DIR__.'/../tests/'.$TestView.'Test.class.php');
    }

}