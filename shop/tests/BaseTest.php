<?php
require_once ('autoload.php');

use PHPUnit\Framework\TestCase;

abstract class BaseTest extends PHPUnit_Framework_TestCase{
    protected function setUp()
    {
        App::Init();
    }
}
