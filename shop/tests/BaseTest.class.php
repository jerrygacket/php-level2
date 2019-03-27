<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.03.19
 * Time: 18:15
 */
require_once (__DIR__.'/vendor/autoload.php');
require_once '../autoload.php';
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase{
    protected function setUp()
    {
        App::Init();
    }
}
echo __DIR__;